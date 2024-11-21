<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Activities\Index as ActivitiesIndex;
use App\Livewire\Activities\Create as ActivitiesCreate;
use App\Livewire\Activities\Edit as ActivitiesEdit;
use App\Livewire\Institutions\Create as InstitutionsCreate;
use App\Livewire\Institutions\Index as InstitutionsIndex;
use App\Livewire\Institutions\Edit as InstitutionsEdit;
use App\Livewire\Companies\Index as CompaniesIndex;
use App\Livewire\Companies\Create as CompaniesCreate;
use App\Livewire\Companies\Edit as CompaniesEdit;

Route::middleware('auth')->group(function()
{
    Route::view('/', 'dashboard')->name('home');

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
});

require __DIR__.'/auth.php';
