<?php

use App\Livewire\Activities\ListActivities;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function()
{
    Route::view('/', 'dashboard')->name('home');

    // RUTAS ACTIVIDADES
    Route::get('/activities', ListActivities::class)->name('activities.index');
});

require __DIR__.'/auth.php';
