<?php

namespace App\Http\Controllers;

use App\Models\InVivo; // Importar el modelo
use Illuminate\Http\Request;

class InVivoController extends Controller
{
    public function index()
    {
        // Usar el modelo para obtener los datos
        $invivos = InVivo::select(
            'id', 
            'reconocimiento_medico', 
            'toxicologico', 
            'diagnostico_mental', 
            'odontologia', 
            'antropologia', 
            'radiologia_forense', 
            'vagino_rectal', 
            'fijaciones_fotograficas', 
            'huellas_mordeduras', 
            'examen_histologico', 
            'examen_citologico'
        )->get();

        return view('invivo.index', compact('invivos'));
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
        //
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

