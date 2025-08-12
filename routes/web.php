<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController; // <-- 1. AÑADE ESTA LÍNEA
use App\Http\Controllers\Location\MunicipioController;
use App\Http\Controllers\Location\ParroquiaController;
use App\Http\Controllers\Location\SectorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    Route::prefix('settings/locations')->name('settings.locations.')->group(function () {
        Route::resource('municipios', MunicipioController::class);
        Route::resource('parroquias', ParroquiaController::class);
        Route::resource('sectores', SectorController::class);
    });
});

require __DIR__ . '/auth.php';
