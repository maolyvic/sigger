<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    /**
     * Devuelve los municipios de un estado específico.
     */
    public function getMunicipios(Estado $estado): JsonResponse
    {
        return response()->json($estado->municipios()->orderBy('nombre')->get());
    }

    /**
     * Devuelve las parroquias de un municipio específico.
     */
    public function getParroquias(Municipio $municipio): JsonResponse
    {
        return response()->json($municipio->parroquias()->orderBy('nombre')->get());
    }

    /**
     * Devuelve los sectores de una parroquia específica.
     */
    public function getSectores(Parroquia $parroquia): JsonResponse
    {
        return response()->json($parroquia->sectores()->orderBy('nombre')->get());
    }
}