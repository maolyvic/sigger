<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // <-- Opcional, para registrar errores

class MunicipioController extends Controller
{
    public function index()
    {
        // 1. Usamos tu consulta personalizada con el Query Builder
        $municipios = DB::table('municipios')
            ->join('estados', 'municipios.estados_id', '=', 'estados.id')
            ->select('municipios.*', 'estados.nombre as estado_nombre')
            ->orderBy('municipios.nombre')
            ->get()
            ->map(function ($item) {
                // Esta parte es clave: Recreas la estructura $municipio->estado->nombre
                // que la vista espera.
                $item->estado = (object) ['nombre' => $item->estado_nombre];
                return $item;
            });

        // 2. También necesitamos obtener todos los estados para el filtro
        $estados = Estado::orderBy('nombre')->get();

        // 3. Pasamos ambas variables a la vista
        return view('settings.locations.municipios.index', compact('municipios', 'estados'));
    }

    public function create()
    {
        // 1. Obtenemos todos los estados, ordenados alfabéticamente para el dropdown.
        $estados = Estado::orderBy('nombre')->get();

        // 2. Retornamos la vista que contendrá el formulario.
        return view('settings.locations.municipios.create', compact('estados'));
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {

                // PASO 1: RECOGER LOS DATOS EN VARIABLES
                $nombreMunicipio = strtoupper($request->input('nombre'));
                $estadoId = $request->input('estado_id');

                // PASO 2: CREAR UNA NUEVA INSTANCIA DEL MODELO
                $municipio = new Municipio();

                // PASO 3: ASIGNAR LAS PROPIEDADES UNA POR UNA
                $municipio->nombre = $nombreMunicipio;
                $municipio->estados_id = $estadoId;

                // PASO 4: GUARDAR EL REGISTRO EN LA BASE DE DATOS
                $municipio->save();
            });

            // REDIRECCIÓN EXITOSA
            return redirect()->route('settings.locations.municipios.index')
                ->with('success', 'Municipio creado con éxito.');
        } catch (\Exception $e) {


            Log::error('Error al crear municipio: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Hubo un error inesperado al guardar el municipio.')
                ->withInput();
        }
    }
    public function destroy(Municipio $municipio)
    {
        try {
            // INICIA LA TRANSACCIÓN DE BASE DE DATOS
            // Garantiza que la operación de borrado sea atómica.
            DB::transaction(function () use ($municipio) {

                // PASO 1: EJECUTAR LA OPERACIÓN DE BORRADO
                // Como tu modelo Municipio usa el trait 'SoftDeletes',
                // esta llamada no borrará el registro permanentemente.
                // En su lugar, establecerá la fecha y hora en la columna 'deleted_at'.
                $municipio->delete();

                // Si necesitaras hacer otras operaciones (como registrar un log de auditoría),
                // irían aquí, dentro de la misma transacción.
            });

            // REDIRECCIÓN EXITOSA
            return redirect()->route('settings.locations.municipios.index')
                ->with('success', 'Municipio eliminado con éxito.');
        } catch (\Exception $e) {
            // MANEJO DE ERRORES
            // Si algo falla (ej. un problema con la base de datos),
            // la transacción se revierte automáticamente.

            Log::error('Error al eliminar municipio con ID ' . $municipio->id . ': ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Hubo un error inesperado al eliminar el municipio.');
        }
    }
    public function edit(Municipio $municipio)
    {

        // 2. Necesitamos la lista de TODOS los estados para el menú desplegable.
        $estados = Estado::orderBy('nombre')->get();

        return view('settings.locations.municipios.edit', compact('municipio', 'estados'));
    }
    public function update(Request $request, string $id)
    {
        // PASO 1: ENCONTRAR EL REGISTRO
        // Buscamos el municipio en la base de datos usando el ID de la URL.
        // findOrFail() es una buena práctica: si no lo encuentra, lanza un error 404.
        $municipio = Municipio::findOrFail($id);

        // PASO 2: ASIGNAR LOS NUEVOS VALORES
        // Asignamos las propiedades una por una desde el request.
        // Mantenemos tu lógica de convertir el nombre a mayúsculas.
        $municipio->nombre = strtoupper($request->input('nombre'));
        $municipio->estados_id = $request->input('estado_id');

        // PASO 3: GUARDAR LOS CAMBIOS
        // El método save() detecta que el modelo ya existe y ejecuta una
        // consulta UPDATE en lugar de un INSERT.
        $municipio->save();

        // PASO 4: REDIRIGIR CON UN MENSAJE DE ÉXITO
        return redirect()->route('settings.locations.municipios.index')
                         ->with('success', 'Municipio actualizado correctamente');
    }

    public function show(Municipio $municipio): JsonResponse
    {
        $municipios = Municipio::with('estado')->orderBy('nombre')->get();

        // 2. Devuelve la colección como JSON.
        return response()->json($municipios);
    }
    
}
