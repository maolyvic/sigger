<?php

namespace App\Http\Controllers;

use App\Models\InVivo;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InVivoController extends Controller
{
    public function index()
    {
        $invivos = InVivo::all();

        return view('invivo.index', compact('invivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('invivo.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user_id = Auth::user()->id;

            $invivo = new InVivo();
            $invivo->reconocimiento_medico = $request->input('Reconocimiento medico');
            $invivo->toxicologico = $request->input('Toxicologico');
            $invivo->diagnostico_mental = $request->input('Diagnostico mental');
            $invivo->odontologia = $request->input('Odontologia');
            $invivo->antropologia = $request->input('Antropologia');
            $invivo->radiologia_forense = $request->input('Radiologia forense');
            $invivo->vagino_rectal = $request->input('Vagino rectal');
            $invivo->fijaciones_fotograficas = $request->input('Fijaciones fotograficas');
            $invivo->huellas_mordeduras = $request->input('Huellas mordeduras');
            $invivo->examen_histologico = $request->input('Examen histologico');
            $invivo->examen_citologico = $request->input('Examen citologico');
            $invivo->user_id = $user_id;
            $invivo->save();

            $log = new Log();
            $log->token = Hash::make('creacion invivo:' . $invivo->id);
            $log->descripcion = 'Se ha creado un nuevo registro de In Vivo con ID: ' . $invivo->id . ' por el usuario: ' . Auth::user()->name;
            $log->user_id = Auth::user()->id;
            $log->save();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('invivo.index')->with('success', '¡Registro creado exitosamente!');
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
        $invivos = InVivo::findOrFail($id);
        return view('invivo.edit', compact('invivos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        try {
            
            $invivo = InVivo::findOrFail($id);
            $invivo->reconocimiento_medico = $request->input('Reconocimiento medico');
            $invivo->toxicologico = $request->input('Toxicologico');
            $invivo->diagnostico_mental = $request->input('Diagnostico mental');
            $invivo->odontologia = $request->input('Odontologia');
            $invivo->antropologia = $request->input('Antropologia');
            $invivo->radiologia_forense = $request->input('Radiologia forense');
            $invivo->vagino_rectal = $request->input('Vagino rectal');
            $invivo->fijaciones_fotograficas = $request->input('Fijaciones fotograficas');
            $invivo->huellas_mordeduras = $request->input('Huellas mordeduras');
            $invivo->examen_histologico = $request->input('Examen histologico');
            $invivo->examen_citologico = $request->input('Examen citologico');
            $invivo->save();

            $log = new Log();
            $log->token = Hash::make('actualizacion invivo:' . $invivo->id);
            $log->descripcion = 'Se ha actualizado el registro de In Vivo con ID: ' . $invivo->id . ' por el usuario: ' . Auth::user()->name;
            $log->user_id = Auth::user()->id;
            $log->save();

            return redirect()->route('invivo.index')->with('success', '¡Registro actualizado exitosamente!');
         
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invivo = InVivo::findOrFail($id);
        $invivo->delete();

        $log = new Log();
        $log->token = Hash::make('eliminacion invivo:' . $invivo->id);
        $log->descripcion = 'Se ha eliminado el registro de In Vivo con ID: ' . $invivo->id . ' por el usuario: ' . Auth::user()->name;
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect()->route('invivo.index')->with('success', '¡Registro eliminado exitosamente!');
    }
}

