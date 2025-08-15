<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LocationController; // <-- La ruta al controlador de la API

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Las rutas aquí dentro requerirán que el usuario esté autenticado.
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ===== RUTAS PARA LA API DE LOCACIONES (DROPDOWNS ANIDADOS) =====
// Agrupamos nuestras rutas para mantenerlas organizadas y seguras
Route::middleware('auth:sanctum')->prefix('locations')->name('api.locations.')->group(function () {

});