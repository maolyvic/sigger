<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Estado; 
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    public function index()
    {
        // Pasamos todos los municipios a la vista principal
        // $municipios = Municipio::with('estado')->latest()->get();
        $municipios = DB::table('municipios')
            ->join('estados', 'municipios.estados_id', '=', 'estados.id')
            ->select('municipios.*', 'estados.nombre as estado_nombre')
            ->orderBy('municipios.nombre')
            ->get()
            ->map(function ($item) {
                $item->estado = (object) ['nombre' => $item->estado_nombre];
                return $item;
            });
        // dd($municipios);
        return view('settings.locations.municipios.index', compact('municipios'));
    }

    public function create()
    {
        // Pasamos todos los estados para poder seleccionarlos en un dropdown
        $estados = Estado::orderBy('nombre')->get();
        return view('settings.locations.municipios.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'estado_id' => 'required|exists:estados,id',
        ]);

        Municipio::create($request->all());

        return redirect()->route('settings.locations.municipios.index')->with('success', 'Municipio creado con éxito.');
    }

}