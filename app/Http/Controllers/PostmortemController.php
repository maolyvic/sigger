<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postmortem;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostmortemController extends Controller
{
    public function index()
    {
        return view('postmortem.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postmortem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user_id = auth()->id();

            $postmortem = new Postmortem();
            $postmortem->certificaciones_causa_natural = $request->input('Certificaciones causa natural');
            $postmortem->toxicologico = $request->input('Toxicologico');
            $postmortem->protocolos_autopsia = $request->input('Protocolos autopsia');
            $postmortem->autopsias_realizadas = $request->input('Autopsias realizadas');
            $postmortem->odontologia = $request->input('Odontologia');
            $postmortem->radiologia_forense = $request->input('Radiologia forense');
            $postmortem->vagino_rectal = $request->input('Vagino rectal');
            $postmortem->fijaciones_fotograficas = $request->input('Fijaciones fotograficas');
            $postmortem->huellas_mordeduras = $request->input('Huellas mordeduras');
            $postmortem->Antropologia = $request->input('Antropologia');
            $postmortem->evidencias_colectadas = $request->input('Evidencias colectadas');
            $postmortem->examen_histologico = $request->input('Examen histologico');
            $postmortem->examen_citologico = $request->input('Examen citologico');
            $postmortem->protocolos_autopsia_animal = $request->input('Protocolos autopsia animal');
            $postmortem->crematorio = $request->input('Crematorio');
            $postmortem->triaje_lopnna = $request->input('Triaje lopnna');
            $postmortem->botanicas_evidencias_biologica = $request->input('Botanicas evidencias biologica');
            $postmortem->quimicas_evidencia_biologica = $request->input('Quimicas evidencia biologica');
            $postmortem->quimicos_botanica_evidencia_biologica = $request->input('Quimicos botanica evidencia biologica');
            $postmortem->save();

            return redirect()->route('postmortem.index')->with('success', 'Postmortem created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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

