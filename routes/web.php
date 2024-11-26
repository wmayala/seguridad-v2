<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Staffbyactivity\Index as StaffIndex;
use App\Livewire\Staffbyactivity\Create as StaffCreate;
use App\Livewire\Staffbyactivity\Edit as StaffEdit;
use App\Livewire\Retired\Index as RetiredIndex;
use App\Livewire\Retired\Create as RetiredCreate;
use App\Livewire\Retired\Edit as RetiredEdit;
use App\Livewire\Beneficiary\Index as BeneficiaryIndex;
use App\Livewire\Beneficiary\Create as BeneficiaryCreate;
use App\Livewire\Beneficiary\Edit as BeneficiaryEdit;
use App\Livewire\Activities\Index as ActivitiesIndex;
use App\Livewire\Activities\Create as ActivitiesCreate;
use App\Livewire\Activities\Edit as ActivitiesEdit;
use App\Livewire\Institutions\Create as InstitutionsCreate;
use App\Livewire\Institutions\Index as InstitutionsIndex;
use App\Livewire\Institutions\Edit as InstitutionsEdit;
use App\Livewire\Companies\Index as CompaniesIndex;
use App\Livewire\Companies\Create as CompaniesCreate;
use App\Livewire\Companies\Edit as CompaniesEdit;

use App\Livewire\Users\Index as UsersIndex;
use App\Livewire\Users\Edit as UsersEdit;

Route::middleware('auth')->group(function()
{
    Route::view('/', 'dashboard')->name('home');

    // RUTAS PERSONAL POR ACTIVIDAD
    Route::get('/staff', StaffIndex::class)->name('staff.index');
    Route::get('/staff/create', StaffCreate::class)->name('staff.create');
    Route::get('/staff/edit/{id}', StaffEdit::class)->name('staff.edit');

    // RUTAS JUBILADOS
    Route::get('/retired', RetiredIndex::class)->name('retired.index');
    Route::get('/retired/create', RetiredCreate::class)->name('retired.create');
    Route::get('/retired/edit/{id}', RetiredEdit::class)->name('retired.edit');

    // RUTAS BENEFICIARIOS
    Route::get('/beneficiary', BeneficiaryIndex::class)->name('beneficiaries.index');
    Route::get('/beneficiary/create', BeneficiaryCreate::class)->name('beneficiaries.create');
    Route::get('/beneficiary/edit/{id}', BeneficiaryEdit::class)->name('beneficiaries.edit');

    // RUTAS ACTIVIDADES
    Route::get('/activities', ActivitiesIndex::class)->name('activities.index');
    Route::get('/activities/create', ActivitiesCreate::class)->name('activities.create');
    Route::get('/activities/edit/{id}', ActivitiesEdit::class)->name('activities.edit');

    // RUTAS INSTITUCIONES
    Route::get('/institutions', InstitutionsIndex::class)->name('institutions.index');
    Route::get('/institutions/create', InstitutionsCreate::class)->name('institutions.create');
    Route::get('/institutions/edit/{id}', InstitutionsEdit::class)->name('institutions.edit');

    // RUTAS EMPRESAS
    Route::get('/companies', CompaniesIndex::class)->name('companies.index');
    Route::get('/companies/create', CompaniesCreate::class)->name('companies.create');
    Route::get('/companies/edit/{id}', CompaniesEdit::class)->name('companies.edit');

    // RUTAS USUARIOS
    Route::get('/users', UsersIndex::class)->name('users.index');
    Route::get('/users/edit/{id}', UsersEdit::class)->name('users.edit');
});

require __DIR__.'/auth.php';
