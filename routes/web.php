<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TransitoController;
use App\Http\Controllers\NoTransitoController;
use App\Http\Controllers\InVivoController;
use App\Http\Controllers\PostmortemController;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () { 
    Route::resource('users', UserController::class)->names('usuarios');
    Route::resource('roles', RolController::class)->names('roles');
    Route::resource('reportes', ReporteController::class)->names('reportes');
    Route::resource('transito', TransitoController::class)->names('transito');
    Route::resource('notransito', NoTransitoController::class)->names('notransito');
    Route::resource('invivo', InVivoController::class)->names('invivo');
    Route::resource('postmortem', PostmortemController::class)->names('postmortem');
 });