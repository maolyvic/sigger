<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Location\MunicipioController;
use App\Http\Controllers\Location\ParroquiaController;
use App\Http\Controllers\Location\SectorController;
use App\Http\Controllers\Location\RedipController;
use App\Http\Controllers\Location\EstadoController;
use App\Http\Controllers\CausaMuerte\TransitoController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\CausaMuerte\NoTransitoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- RUTAS DE CONFIGURACIÓN ---
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    Route::prefix('settings/locations')
        ->name('settings.locations.')
        ->group(function () {
            Route::resource('municipios', MunicipioController::class);
            Route::resource('estados', EstadoController::class);
            Route::resource('parroquias', ParroquiaController::class);
            Route::get('sectores/data', [SectorController::class, 'getData'])->name('sectores.data');
            Route::resource('sectores', SectorController::class);
            Route::resource('redips', RedipController::class);
        });

    // --- RUTAS DE CAUSA DE MUERTE ---
    Route::get('causa-muerte/transito/data', [TransitoController::class, 'getData'])->name('causa_muerte.transito.data');
    Route::resource('causa-muerte/transito', TransitoController::class)->names('causa_muerte.transito');

    Route::get('causa-muerte/no-transito/data', [NoTransitoController::class, 'getData'])->name('causa_muerte.no_transito.data');
    Route::resource('causa-muerte/no-transito', NoTransitoController::class)->names('causa_muerte.no_transito');
    Route::prefix('api/locations') // Todas las rutas de API empezarán con /api/locations
        ->name('api.locations.')
        ->group(function () {
            Route::get('/estados/{estado}/municipios', [LocationController::class, 'getMunicipios'])->name('getMunicipios');
            Route::get('/municipios/{municipio}/parroquias', [LocationController::class, 'getParroquias'])->name('getParroquias');
            Route::get('/parroquias/{parroquia}/sectores', [LocationController::class, 'getSectores'])->name('getSectores');
        });
});

require __DIR__ . '/auth.php';