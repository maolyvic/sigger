<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Parroquia; // ¡Importante! Necesitamos las Parroquias
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
class SectorController extends Controller
{
    public function index()
    {

        return view('settings.locations.sectores.index');
    }
    public function getData()
    {
        // 2. Inicia la consulta con la relación para ser eficiente (Eager Loading).
        $query = Sector::with('parroquia');

        // 3. Usa el paquete para procesar la consulta y construir la respuesta.
        return DataTables::of($query)
            ->editColumn('parroquia', function ($sector) {
                // Formatea la columna para mostrar el nombre de la parroquia.
                return $sector->parroquia?->nombre ?? 'N/A';
            })
            ->addColumn('action', function ($sector) {
                // Genera el HTML para los botones de acción usando el estilo que definiste.
                $editUrl = route('settings.locations.sectores.edit', $sector->id);
                $destroyUrl = route('settings.locations.sectores.destroy', $sector->id);

                return '
                    <div class="flex items-center space-x-4">
                        <a href="' . $editUrl . '" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="' . $destroyUrl . '" method="POST" onsubmit="return confirm(\'¿Estás seguro?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="text-red-600 hover:text-red-900">Borrar</button>
                        </form>
                    </div>
                ';
            })
            // Le dice a Datatables que la columna 'action' es HTML y no debe ser escapada.
            ->rawColumns(['action'])
            ->make(true);
    }




    public function create()
    {
        $parroquias = Parroquia::orderBy('nombre')->get();
        return view('settings.locations.sectores.create', compact('parroquias'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => ['required', 'string', 'max:255', Rule::unique('sectores')->where('parroquia_id', $request->parroquia_id)],
                'parroquia_id' => 'required|exists:parroquias,id',
            ],
            [
                'nombre.unique' => 'Ya existe un sector con este nombre en la parroquia seleccionada.',
            ],
        );

        try {
            DB::transaction(function () use ($request) {
                Sector::create([
                    'nombre' => strtoupper($request->input('nombre')),
                    'parroquia_id' => $request->input('parroquia_id'),
                ]);
            });
            return redirect()->route('settings.locations.sectores.index')->with('success', 'Sector creado con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al crear Sector: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al crear el Sector.')->withInput();
        }
    }

    public function edit(Sector $sector)
    {
        $parroquias = Parroquia::orderBy('nombre')->get();
        return view('settings.locations.sectores.edit', compact('sector', 'parroquias'));
    }

    public function update(Request $request, Sector $sector)
    {
        $request->validate(
            [
                'nombre' => ['required', 'string', 'max:255', Rule::unique('sectores')->where('parroquia_id', $request->parroquia_id)->ignore($sector->id)],
                'parroquia_id' => 'required|exists:parroquias,id',
            ],
            [
                'nombre.unique' => 'Ya existe otro sector con este nombre en la parroquia seleccionada.',
            ],
        );

        try {
            DB::transaction(function () use ($request, $sector) {
                $sector->update([
                    'nombre' => strtoupper($request->input('nombre')),
                    'parroquia_id' => $request->input('parroquia_id'),
                ]);
            });
            return redirect()->route('settings.locations.sectores.index')->with('success', 'Sector actualizado con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar Sector ID ' . $sector->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al actualizar el Sector.')->withInput();
        }
    }

    public function destroy(Sector $sector)
    {
        try {
            DB::transaction(function () use ($sector) {
                $sector->delete();
            });
            return redirect()->route('settings.locations.sectores.index')->with('success', 'Sector eliminado con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar Sector ID ' . $sector->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al eliminar el Sector.');
        }
    }
}
