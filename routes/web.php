<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Staffbyactivity\Index as StaffIndex;
use App\Livewire\Staffbyactivity\Create as StaffCreate;
use App\Livewire\Staffbyactivity\Edit as StaffEdit;
use App\Livewire\Retired\Index as RetiredIndex;
use App\Livewire\Retired\Create as RetiredCreate;
use App\Livewire\Retired\Edit as RetiredEdit;
use App\Livewire\Sfstaff\Index as SFStaffIndex;
use App\Livewire\Sfstaff\Create as SFStaffCreate;
use App\Livewire\Sfstaff\Edit as SFStaffEdit;
use App\Livewire\Cstaff\Index as CStaffIndex;
use App\Livewire\Cstaff\Create as CStaffCreate;
use App\Livewire\Cstaff\Edit as CStaffEdit;
use App\Livewire\Vehicles\Index as VehiclesIndex;
use App\Livewire\Vehicles\Create as VehiclesCreate;
use App\Livewire\Vehicles\Edit as VehiclesEdit;
use App\Livewire\Beneficiary\Index as BeneficiaryIndex;
use App\Livewire\Beneficiary\Create as BeneficiaryCreate;
use App\Livewire\Beneficiary\Edit as BeneficiaryEdit;
use App\Livewire\Signatures\Index as SignaturesIndex;
// use App\Livewire\Beneficiary\Create as BeneficiaryCreate;
// use App\Livewire\Beneficiary\Edit as BeneficiaryEdit;

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

    // RUTAS PERSONAL SISTEMA FINANCIERO
    Route::get('/sfstaff', SFStaffIndex::class)->name('sfstaff.index');
    Route::get('/sfstaff/create', SFStaffCreate::class)->name('sfstaff.create');
    Route::get('/sfstaff/edit/{id}', SFStaffEdit::class)->name('sfstaff.edit');

    // RUTAS PERSONAL EMPRESAS
    Route::get('/cstaff', CStaffIndex::class)->name('cstaff.index');
    Route::get('/cstaff/create', CStaffCreate::class)->name('cstaff.create');
    Route::get('/cstaff/edit/{id}', CStaffEdit::class)->name('cstaff.edit');

    // RUTAS VEHÍCULOS
    Route::get('/vehicles', VehiclesIndex::class)->name('vehicles.index');
    Route::get('/vehicles/create', VehiclesCreate::class)->name('vehicles.create');
    Route::get('/vehicles/edit/{id}', VehiclesEdit::class)->name('vehicles.edit');

    // RUTAS BENEFICIARIOS
    Route::get('/beneficiary', BeneficiaryIndex::class)->name('beneficiaries.index');
    Route::get('/beneficiary/create', BeneficiaryCreate::class)->name('beneficiaries.create');
    Route::get('/beneficiary/edit/{id}', BeneficiaryEdit::class)->name('beneficiaries.edit');

    // RUTAS FIRMAS AUTORIZADAS
    Route::get('/signatures', SignaturesIndex::class)->name('signatures.index');
    //Route::get('/beneficiary/create', BeneficiaryCreate::class)->name('beneficiaries.create');
    //Route::get('/beneficiary/edit/{id}', BeneficiaryEdit::class)->name('beneficiaries.edit');

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
