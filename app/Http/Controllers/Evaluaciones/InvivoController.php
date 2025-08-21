<?php

namespace App\Http\Controllers\Evaluaciones;

use App\Http\Controllers\Controller;
use App\Models\Invivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class InvivoController extends Controller
{
    public function index()
    {
        return view('evaluaciones.invivo.index');
    }

    public function getData()
    {
        $query = Invivo::select('id', 'reconocimiento_medico', 'toxicologico', 'diagnostico_mental', 'created_at');

        return DataTables::of($query)
            ->editColumn('created_at', function ($registro) {
                return $registro->created_at->format('d/m/Y H:i');
            })
            ->addColumn('action', function ($registro) {
                // =====        GENERACIÓN DE BOTONES AQUÍ              =====
                // ==========================================================
                // Generamos las URLs para cada acción
                $showUrl = route('evaluaciones.invivo.show', $registro->id); // Asumiendo que crearás el método show
                $editUrl = route('evaluaciones.invivo.edit', $registro->id);
                $destroyUrl = route('evaluaciones.invivo.destroy', $registro->id);

                // Construimos el HTML de los botones usando el estilo estándar
                return '
                    <div class="flex items-center space-x-4">
                        <a href="' .
                    $showUrl .
                    '" class="text-blue-600 hover:text-blue-900">Ver</a>
                        <a href="' .
                    $editUrl .
                    '" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        <form action="' .
                    $destroyUrl .
                    '" method="POST" onsubmit="return confirm(\'¿Estás seguro de que quieres eliminar esta evaluación?\');">
                            ' .
                    csrf_field() .
                    '
                            ' .
                    method_field('DELETE') .
                    '
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                Borrar
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('evaluaciones.invivo.create');
    }

    public function store(Request $request)
    {
        // ==========================================================
        // =====    1. RECOLECCIÓN Y SANEAMIENTO DE DATOS       =====
        // ==========================================================
        $reconocimiento_medico = $request->input('reconocimiento_medico') ? (int) $request->input('reconocimiento_medico') : 0;
        $toxicologico = $request->input('toxicologico') ? (int) $request->input('toxicologico') : 0;
        $diagnostico_mental = $request->input('diagnostico_mental') ? (int) $request->input('diagnostico_mental') : 0;
        $odontologia = $request->input('odontologia') ? (int) $request->input('odontologia') : 0;
        $antropologia = $request->input('antropologia') ? (int) $request->input('antropologia') : 0;
        $radiologia_forense = $request->input('radiologia_forense') ? (int) $request->input('radiologia_forense') : 0;
        $vagino_rectal = $request->input('vagino_rectal') ? (int) $request->input('vagino_rectal') : 0;
        $fijaciones_fotograficas = $request->input('fijaciones_fotograficas') ? (int) $request->input('fijaciones_fotograficas') : 0;
        $huellas_mordeduras = $request->input('huellas_mordeduras') ? (int) $request->input('huellas_mordeduras') : 0;
        $examen_histologico = $request->input('examen_histologico') ? (int) $request->input('examen_histologico') : 0;
        $examen_citologico = $request->input('examen_citologico') ? (int) $request->input('examen_citologico') : 0;

        // ==========================================================
        // =====       2. VALIDACIÓN MANUAL CON ARRAY DE ERRORES  =====
        // ==========================================================
        $errores = [];

        // Como todos son números, una validación clave es asegurarse de que no sean negativos.
        if ($reconocimiento_medico < 0) {
            $errores[] = 'La cantidad para Reconocimiento Médico no puede ser negativa.';
        }
        if ($toxicologico < 0) {
            $errores[] = 'La cantidad para Toxicológico no puede ser negativa.';
        }
        if ($diagnostico_mental < 0) {
            $errores[] = 'La cantidad para Diagnóstico Mental no puede ser negativa.';
        }
        if ($odontologia < 0) {
            $errores[] = 'La cantidad para Odontología no puede ser negativa.';
        }
        if ($antropologia < 0) {
            $errores[] = 'La cantidad para Antropología no puede ser negativa.';
        }
        if ($radiologia_forense < 0) {
            $errores[] = 'La cantidad para Radiología Forense no puede ser negativa.';
        }
        if ($vagino_rectal < 0) {
            $errores[] = 'La cantidad para Vagino-Rectal no puede ser negativa.';
        }
        if ($fijaciones_fotograficas < 0) {
            $errores[] = 'La cantidad para Fijaciones Fotográficas no puede ser negativa.';
        }
        if ($huellas_mordeduras < 0) {
            $errores[] = 'La cantidad para Huellas de Mordeduras no puede ser negativa.';
        }
        if ($examen_histologico < 0) {
            $errores[] = 'La cantidad para Examen Histológico no puede ser negativa.';
        }
        if ($examen_citologico < 0) {
            $errores[] = 'La cantidad para Examen Citológico no puede ser negativa.';
        }

        // Si hay errores, lanzamos la excepción
        if (count($errores) > 0) {
            throw new \Exception(implode('<br>', $errores));
        }

        // ==========================================================
        // =====       3. GUARDADO EN BASE DE DATOS (CON SAVE)  =====
        // ==========================================================

        $registro = new Invivo();

        $registro->reconocimiento_medico = $reconocimiento_medico;
        $registro->toxicologico = $toxicologico;
        $registro->diagnostico_mental = $diagnostico_mental;
        $registro->odontologia = $odontologia;
        $registro->antropologia = $antropologia;
        $registro->radiologia_forense = $radiologia_forense;
        $registro->vagino_rectal = $vagino_rectal;
        $registro->fijaciones_fotograficas = $fijaciones_fotograficas;
        $registro->huellas_mordeduras = $huellas_mordeduras;
        $registro->examen_histologico = $examen_histologico;
        $registro->examen_citologico = $examen_citologico;
        $registro->user_id = Auth::id();
        $registro->save();
        return redirect()->route('evaluaciones.invivo.index')->with('success', 'Registro In Vivo creado con éxito.');
    }

    public function edit(Invivo $invivo)
    {
        return view('evaluaciones.invivo.edit', compact('invivo'));
    }

    public function update(Request $request, Invivo $invivo)
    {
        // ==========================================================
        // =====    1. RECOLECCIÓN Y SANEAMIENTO DE DATOS       =====
        // ==========================================================
        $reconocimiento_medico = $request->input('reconocimiento_medico') ? (int) $request->input('reconocimiento_medico') : 0;
        $toxicologico = $request->input('toxicologico') ? (int) $request->input('toxicologico') : 0;
        $diagnostico_mental = $request->input('diagnostico_mental') ? (int) $request->input('diagnostico_mental') : 0;
        $odontologia = $request->input('odontologia') ? (int) $request->input('odontologia') : 0;
        $antropologia = $request->input('antropologia') ? (int) $request->input('antropologia') : 0;
        $radiologia_forense = $request->input('radiologia_forense') ? (int) $request->input('radiologia_forense') : 0;
        $vagino_rectal = $request->input('vagino_rectal') ? (int) $request->input('vagino_rectal') : 0;
        $fijaciones_fotograficas = $request->input('fijaciones_fotograficas') ? (int) $request->input('fijaciones_fotograficas') : 0;
        $huellas_mordeduras = $request->input('huellas_mordeduras') ? (int) $request->input('huellas_mordeduras') : 0;
        $examen_histologico = $request->input('examen_histologico') ? (int) $request->input('examen_histologico') : 0;
        $examen_citologico = $request->input('examen_citologico') ? (int) $request->input('examen_citologico') : 0;

        // ==========================================================
        // =====       2. VALIDACIÓN MANUAL CON ARRAY DE ERRORES  =====
        // ==========================================================
        $errores = [];

        // Como todos son números, una validación clave es asegurarse de que no sean negativos.
        if ($reconocimiento_medico < 0) {
            $errores[] = 'La cantidad para Reconocimiento Médico no puede ser negativa.';
        }
        if ($toxicologico < 0) {
            $errores[] = 'La cantidad para Toxicológico no puede ser negativa.';
        }
        if ($diagnostico_mental < 0) {
            $errores[] = 'La cantidad para Diagnóstico Mental no puede ser negativa.';
        }
        if ($odontologia < 0) {
            $errores[] = 'La cantidad para Odontología no puede ser negativa.';
        }
        if ($antropologia < 0) {
            $errores[] = 'La cantidad para Antropología no puede ser negativa.';
        }
        if ($radiologia_forense < 0) {
            $errores[] = 'La cantidad para Radiología Forense no puede ser negativa.';
        }
        if ($vagino_rectal < 0) {
            $errores[] = 'La cantidad para Vagino-Rectal no puede ser negativa.';
        }
        if ($fijaciones_fotograficas < 0) {
            $errores[] = 'La cantidad para Fijaciones Fotográficas no puede ser negativa.';
        }
        if ($huellas_mordeduras < 0) {
            $errores[] = 'La cantidad para Huellas de Mordeduras no puede ser negativa.';
        }
        if ($examen_histologico < 0) {
            $errores[] = 'La cantidad para Examen Histológico no puede ser negativa.';
        }
        if ($examen_citologico < 0) {
            $errores[] = 'La cantidad para Examen Citológico no puede ser negativa.';
        }

        // Si hay errores, lanzamos la excepción
        if (count($errores) > 0) {
            throw new \Exception(implode('<br>', $errores));
        }

        // Usamos el modelo existente que Laravel nos pasó ($invivo)
        $registro = $invivo;

        $registro->reconocimiento_medico = $reconocimiento_medico;
        $registro->toxicologico = $toxicologico;
        $registro->diagnostico_mental = $diagnostico_mental;
        $registro->odontologia = $odontologia;
        $registro->antropologia = $antropologia;
        $registro->radiologia_forense = $radiologia_forense;
        $registro->vagino_rectal = $vagino_rectal;
        $registro->fijaciones_fotograficas = $fijaciones_fotograficas;
        $registro->huellas_mordeduras = $huellas_mordeduras;
        $registro->examen_histologico = $examen_histologico;
        $registro->examen_citologico = $examen_citologico;

        // Guardamos los cambios en el registro existente
        $registro->save();

        return redirect()->route('evaluaciones.invivo.index')->with('success', 'Registro In Vivo actualizado con éxito.');
    }

    public function destroy(Invivo $invivo)
    {
        try {
            // Usamos una transacción para garantizar la integridad de la operación.
            DB::transaction(function () use ($invivo) {
                // El modelo Invivo usa SoftDeletes, por lo que esto
                // no borrará el registro, solo establecerá el 'deleted_at'.
                $invivo->delete();
            });

            return redirect()->route('evaluaciones.invivo.index')->with('success', 'Evaluación In Vivo eliminada con éxito.');
        } catch (\Exception $e) {
            // Registramos el error para futura depuración.
            Log::error('Error al eliminar Evaluación In Vivo con ID ' . $invivo->id . ': ' . $e->getMessage());

            return redirect()->route('evaluaciones.invivo.index')->with('error', 'Hubo un error inesperado al eliminar la evaluación.');
        }
    }

    public function show(Invivo $invivo)
    {
        // Aquí puedes implementar la lógica para mostrar un registro específico
        return view('evaluaciones.invivo.show', compact('invivo'));
    }
}
