<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CausaMuerte; // Importar el modelo

class TransitoController extends Controller
{
    public function index()
    {
        $transito = CausaMuerte::select(
            'numero_entrada',
            'despacho',
            'numero_expediente',
            'direccion_remocion_cadaver',
            'delito',
            'causa_muerte',
            'mecanismo_causa_muerte',
            'tipo_vehiculo',
            'fecha_suceso_transito',
            'fecha_ingreso_cadaver',
            'hora',
            'estado',
            'municipio',
            'parroquia',
            'sector',
            'direccion_exacta',
            'categorizacion_referencias',
            'nombres_apellidos',
            'sexo',
            'embarazada',
            'edad',
            'edad_medida',
            'grupo_etario',
            'tipo_identificacion',
            'nacionalidad',
            'identificacion',
            'nivel_instruccion',
            'sitio_donde_laboraba',
            'descripcion',
            'fecha_dictamen_muerte',
            'hora_dictamen_muerte',
            'fases_descomposicion',
            'observaciones'
        )->get();
        return view('transito.index' , compact('transito'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numero_entrada' => 'required|string',
            'despacho' => 'required|string',
            'numero_expediente' => 'required|string',
            'direccion_remocion_cadaver' => 'required|string',
            'delito' => 'required|string',
            'causa_muerte' => 'required|string',
            'mecanismo_causa_muerte' => 'required|string',
            'tipo_vehiculo' => 'required|string',
            'fecha_suceso_transito' => 'required|date',
            'fecha_ingreso_cadaver' => 'required|date',
            'hora' => 'required|string',
            'estado' => 'required|string',
            'municipio' => 'required|string',
            'parroquia' => 'required|string',
            'sector' => 'required|string',
            'direccion_exacta' => 'required|string',
            'categorizacion_referencias' => 'required|string',
            'nombres_apellidos' => 'required|string',
            'sexo' => 'required|string',
            'embarazada' => 'nullable|boolean',
            'edad' => 'required|integer',
            'edad_medida' => 'required|string',
            'grupo_etario' => 'required|string',
            'tipo_identificacion' => 'required|string',
            'nacionalidad' => 'required|string',
            'identificacion' => 'required|string',
            'nivel_instruccion' => 'required|string',
            'sitio_donde_laboraba' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'fecha_dictamen_muerte' => 'required|date',
            'hora_dictamen_muerte' => 'required|string',
            'fases_descomposicion' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        Transito::create($validatedData);

        return redirect()->route('transito.index')->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
