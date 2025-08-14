<?php

namespace App\Http\Controllers\Location;


use App\Http\Controllers\Controller;
use App\Models\Redip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class RedipController extends Controller
{
    /**
     * Muestra la lista de Redips.
     */
    public function index()
    {
        $redips = Redip::orderBy('nombre')->get();
        return view('settings.locations.redips.index', compact('redips'));
    }

    /**
     * Muestra el formulario para crear una nueva Redip.
     */
    public function create()
    {
        return view('settings.locations.redips.create');
    }

    /**
     * Guarda la nueva Redip en la base de datos.
     */
    public function store(Request $request)
    {
            $redip = new Redip();
            $redip->nombre = strtoupper($request->input('nombre'));
            $redip->codigo = strtoupper($request->input('codigo'));
            $redip->descripcion = strtoupper($request->input('descripcion'));
            $redip->user_id = auth()->id();
            $redip->save();

            return redirect()->route('settings.locations.redips.index')->with('success', 'Redip creada con éxito.');

    }

    public function edit(Redip $redip)
    {
        return view('settings.locations.redips.edit', compact('redip'));
    }

    public function update(Request $request, Redip $redip)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255', Rule::unique('redips')->ignore($redip->id)],
            'codigo' => ['nullable', 'string', 'max:50', Rule::unique('redips')->ignore($redip->id)],
        ]);

        try {
            DB::transaction(function () use ($request, $redip) {
                $redip->nombre = strtoupper($request->input('nombre'));
                $redip->codigo = strtoupper($request->input('codigo'));
                $redip->descripcion = $request->input('descripcion');
                $redip->save();
            });
            return redirect()->route('settings.locations.redips.index')->with('success', 'Redip actualizada con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar Redip con ID ' . $redip->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al actualizar la Redip.')->withInput();
        }
    }

    /**
     * Elimina (lógicamente) la Redip de la base de datos.
     */
    public function destroy(Redip $redip)
    {
        try {
            DB::transaction(function () use ($redip) {
                $redip->delete();
            });
            return redirect()->route('settings.locations.redips.index')->with('success', 'Redip eliminada con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar Redip con ID ' . $redip->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al eliminar la Redip.');
        }
    }
}