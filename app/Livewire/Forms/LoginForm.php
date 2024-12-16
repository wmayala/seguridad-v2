<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $values = $this->only('email', 'password');

        $credential = [
            'mail' => $values['email'],
            'password' => $values['password'],
        ];

        $activoInactivo = User::where('email', $values['email'])->first();

        if (!is_null($activoInactivo) && $activoInactivo->status === 1) {
            if (!Auth::guard('web')->attempt($credential, $this->remember)) {
                RateLimiter::hit($this->throttleKey());
                throw ValidationException::withMessages([
                    'form.email' => 'Correo o contraseña incorrectos',
                ]);
            }

            $user = Auth::guard('web')->user();
            session()->put('roleId', $user->role_default);

            RateLimiter::clear($this->throttleKey());

        } else {
            throw ValidationException::withMessages([
                'form.email' => 'Usuario no existe o se encuentra deshabilitado',
            ]);
        }

    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'form.email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}
