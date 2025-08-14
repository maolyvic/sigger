<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Parroquia;
use App\Models\Municipio; // ¡Importante! Necesitamos los Municipios
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ParroquiaController extends Controller
{
    public function index()
    {
        $parroquias = Parroquia::with('municipio')->orderBy('nombre')->get();
        return view('settings.locations.parroquias.index', compact('parroquias'));
    }

    public function create()
    {
        $municipios = Municipio::orderBy('nombre')->get();
        return view('settings.locations.parroquias.create', compact('municipios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            // La regla 'unique' ahora debe considerar el municipio_id para permitir parroquias con el mismo nombre en diferentes municipios
            'municipio_id' => 'required|exists:municipios,id',
        ]);

        try {
            DB::transaction(function () use ($request) {
                Parroquia::create([
                    'nombre' => strtoupper($request->input('nombre')),
                    'municipio_id' => $request->input('municipio_id'),
                ]);
            });
            return redirect()->route('settings.locations.parroquias.index')->with('success', 'Parroquia creada con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al crear Parroquia: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al crear la Parroquia.')->withInput();
        }
    }

    public function edit(Parroquia $parroquia)
    {
        $municipios = Municipio::orderBy('nombre')->get();
        return view('settings.locations.parroquias.edit', compact('parroquia', 'municipios'));
    }

    public function update(Request $request, Parroquia $parroquia)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'municipio_id' => 'required|exists:municipios,id',
        ]);

        try {
            DB::transaction(function () use ($request, $parroquia) {
                $parroquia->update([
                    'nombre' => strtoupper($request->input('nombre')),
                    'municipio_id' => $request->input('municipio_id'),
                ]);
            });
            return redirect()->route('settings.locations.parroquias.index')->with('success', 'Parroquia actualizada con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar Parroquia ID ' . $parroquia->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al actualizar la Parroquia.')->withInput();
        }
    }

    public function destroy(Parroquia $parroquia)
    {
        try {
            DB::transaction(function () use ($parroquia) {
                $parroquia->delete();
            });
            return redirect()->route('settings.locations.parroquias.index')->with('success', 'Parroquia eliminada con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar Parroquia ID ' . $parroquia->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al eliminar la Parroquia.');
        }
    }
}