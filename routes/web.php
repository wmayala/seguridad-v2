<?php

use App\Livewire\Activities\ListActivities;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function()
{
    Route::view('/', 'dashboard')->name('home');

    Route::get('/activities', ListActivities::class)->name('activities.index');
});

/* Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile'); */

require __DIR__.'/auth.php';
