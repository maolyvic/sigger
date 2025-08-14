<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Redip; // ¡Importante! Necesitamos las Redips para los dropdowns
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EstadoController extends Controller
{
    /**
     * Muestra la lista de Estados.
     */
    public function index()
    {
        // Usamos with('redip') para cargar la relación y ser más eficientes (Eager Loading)
        $estados = Estado::with('redip')->orderBy('nombre')->get();
        return view('settings.locations.estados.index', compact('estados'));
    }

    /**
     * Muestra el formulario para crear un nuevo Estado.
     */
    public function create()
    {
        // Pasamos todas las Redips para poder seleccionarlas en el formulario
        $redips = Redip::orderBy('nombre')->get();
        return view('settings.locations.estados.create', compact('redips'));
    }

    /**
     * Guarda el nuevo Estado en la base de datos.
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:255|unique:estados,nombre',
            'codigo' => 'nullable|string|max:50|unique:estados,codigo',
            'redip_id' => 'required|exists:redips,id',
        ];
        $messages = [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique' => 'Ya existe un estado con este nombre.',
            'redip_id.required' => 'Debe seleccionar una Redip.',
            'redip_id.exists' => 'La Redip seleccionada no es válida.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::transaction(function () use ($request) {
                $estado = new Estado();
                $estado->nombre = strtoupper($request->input('nombre'));
                $estado->codigo = strtoupper($request->input('codigo'));
                $estado->redip_id = $request->input('redip_id');
                $estado->user_id = auth()->id();
                $estado->save();
            });
            return redirect()->route('settings.locations.estados.index')->with('success', 'Estado creado con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al crear Estado: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al crear el Estado.')->withInput();
        }
    }

    /**
     * Muestra el formulario para editar un Estado.
     */
    public function edit(Estado $estado)
    {
        $redips = Redip::orderBy('nombre')->get();
        return view('settings.locations.estados.edit', compact('estado', 'redips'));
    }

    /**
     * Actualiza el Estado en la base de datos.
     */
    public function update(Request $request, Estado $estado)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255', Rule::unique('estados')->ignore($estado->id)],
            'codigo' => ['nullable', 'string', 'max:50', Rule::unique('estados')->ignore($estado->id)],
            'redip_id' => 'required|exists:redips,id',
        ]);

        try {
            DB::transaction(function () use ($request, $estado) {
                $estado->nombre = strtoupper($request->input('nombre'));
                $estado->codigo = strtoupper($request->input('codigo'));
                $estado->redip_id = $request->input('redip_id');
                $estado->save();
            });
            return redirect()->route('settings.locations.estados.index')->with('success', 'Estado actualizado con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar Estado con ID ' . $estado->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al actualizar el Estado.')->withInput();
        }
    }

    /**
     * Elimina (lógicamente) el Estado de la base de datos.
     */
    public function destroy(Estado $estado)
    {
        try {
            DB::transaction(function () use ($estado) {
                $estado->delete();
            });
            return redirect()->route('settings.locations.estados.index')->with('success', 'Estado eliminado con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar Estado con ID ' . $estado->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al eliminar el Estado.');
        }
    }
}