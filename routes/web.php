<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransitoController;
use App\Http\Controllers\NoTransitoController;
use App\Http\Controllers\InVivoController;
use App\Http\Controllers\PostmortemController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PermisosController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () { 
    Route::resource('usuarios', UserController::class)->names('usuarios');
    Route::resource('permisos', PermisosController::class)->names('permisos');
    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('reportes', ReporteController::class)->names('reportes');
    Route::resource('transito', TransitoController::class)->names('transito');
    Route::resource('notransito', NoTransitoController::class)->names('notransito');
    Route::resource('invivo', InVivoController::class)->names('invivo');
    Route::resource('postmortem', PostmortemController::class)->names('postmortem');
    Route::resource('roles', RoleController::class)->names('roles');
 });