<?php

namespace App\Http\Controllers\CausaMuerte;

use App\Http\Controllers\Controller;
use App\Models\CausaMuerte;
use App\Models\Estado;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class NoTransitoController extends Controller
{
    /**
     * Muestra la vista del listado.
     */
    public function index()
    {
        return view('causa_muerte.no_transito.index');
    }

    /**
     * Procesa las peticiones de Datatables.
     */
    public function getData()
    {
        // Filtramos para mostrar registros donde el delito NO ES TRÁNSITO
        $query = CausaMuerte::where('delito', '!=', 'TRÁNSITO');

        return DataTables::of($query)
            ->addColumn('action', function ($registro) {
                $showUrl = route('causa_muerte.no_transito.show', $registro->id);
                $editUrl = route('causa_muerte.no_transito.edit', $registro->id);
                $destroyUrl = route('causa_muerte.no_transito.destroy', $registro->id);

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
                    '" method="POST" onsubmit="return confirm(\'¿Estás seguro?\');">
                            ' .
                    csrf_field() .
                    '
                            ' .
                    method_field('DELETE') .
                    '
                            <button type="submit" class="text-red-600 hover:text-red-900">Borrar</button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Muestra el formulario de creación.
     */
    public function create()
    {
        // Pasamos los datos necesarios para los dropdowns
        $estados = Estado::orderBy('nombre')->get();
        // ... puedes pasar otras colecciones si las necesitas (municipios, etc.)
        return view('causa_muerte.no_transito.create', compact('estados'));
    }
    public function store(Request $request)
    {
        try {
            // ==========================================================
            // =====    1. RECOLECCIÓN Y SANEAMIENTO DE DATOS       =====
            // ==========================================================
            $numero_entrada = $request->input('numero_entrada') ? trim(strtoupper($request->input('numero_entrada'))) : null;
            $numero_expediente = $request->input('numero_expediente') ? trim(strtoupper($request->input('numero_expediente'))) : null;
            $despacho = $request->input('despacho');
            $fecha_ingreso_cadaver = $request->input('fecha_ingreso_cadaver');
            $hora = $request->input('hora');

            $delito = $request->input('delito');
            $tipo_vehiculo = $request->input('tipo_vehiculo');
            $fecha_suceso_transito = $request->input('fecha_suceso_transito');
            $causa_muerte_presunta = $request->input('causa_muerte');
            $mecanismo_causa_muerte = $request->input('mecanismo_causa_muerte');

            $estado_id = $request->input('estado_id');
            $municipio_id = $request->input('municipio_id');
            $parroquia_id = $request->input('parroquia_id');
            $sector_id = $request->input('sector_id') ?: null;
            $direccion_remocion_cadaver = $request->input('direccion_remocion_cadaver');
            $categorizacion_referencias = $request->input('categorizacion_referencias');
            $direccion_exacta = $request->input('direccion_exacta') ? trim(strtoupper($request->input('direccion_exacta'))) : null;

            $nombres_apellidos = $request->input('nombres_apellidos') ? trim(strtoupper($request->input('nombres_apellidos'))) : null;
            $sexo = $request->input('sexo');
            $embarazada = $request->input('embarazada');
            $edad = (int) $request->input('edad');
            $edad_medida = $request->input('edad_medida');
            $nacionalidad = $request->input('nacionalidad');
            $tipo_identificacion = $request->input('tipo_identificacion');
            $identificacion = $request->input('identificacion') ? trim(strtoupper($request->input('identificacion'))) : null;
            $nivel_instruccion = $request->input('nivel_instruccion');
            $sitio_donde_laboraba = $request->input('sitio_donde_laboraba');
            $descripcion = $request->input('descripcion') ? trim(strtoupper($request->input('descripcion'))) : null;

            $fecha_dictamen_muerte = $request->input('fecha_dictamen_muerte');
            $hora_dictamen_muerte = $request->input('hora_dictamen_muerte');
            $fases_descomposicion = $request->input('fases_descomposicion');
            $observaciones = $request->input('observaciones') ? trim(strtoupper($request->input('observaciones'))) : null;

            // ==========================================================
            // =====       2. VALIDACIÓN MANUAL CON ARRAY DE ERRORES  =====
            // ==========================================================
            $errores = [];
            if (empty($numero_entrada)) {
                $errores[] = 'El Número de Entrada es obligatorio.';
            }
            $existingEntrada = CausaMuerte::where('numero_entrada', $numero_entrada)->first();
            if ($existingEntrada) {
                $errores[] = 'El Número de Entrada ya ha sido registrado.';
            }
            if (empty($fecha_ingreso_cadaver)) {
                $errores[] = 'La Fecha de Ingreso del Cadáver es obligatoria.';
            }
            if (empty($hora)) {
                $errores[] = 'La Hora de Ingreso es obligatoria.';
            }
            if (empty($estado_id)) {
                $errores[] = 'Debe seleccionar un Estado.';
            }
            if (empty($municipio_id)) {
                $errores[] = 'Debe seleccionar un Municipio.';
            }
            if (empty($parroquia_id)) {
                $errores[] = 'Debe seleccionar una Parroquia.';
            }
            if (empty($direccion_exacta)) {
                $errores[] = 'La Dirección Exacta es obligatoria.';
            }
            if (empty($sexo)) {
                $errores[] = 'Debe seleccionar un Sexo.';
            }
            if ($edad < 0) {
                $errores[] = 'La Edad no puede ser un número negativo.';
            }
            if (empty($edad_medida)) {
                $errores[] = 'Debe seleccionar una Medida para la edad.';
            }
            if (empty($fecha_dictamen_muerte)) {
                $errores[] = 'La Fecha de Dictamen de Muerte es obligatoria.';
            }
            if (empty($hora_dictamen_muerte)) {
                $errores[] = 'La Hora de Dictamen de Muerte es obligatoria.';
            }

            if (count($errores) > 0) {
                throw new \Exception(implode('<br>', $errores));
            }

            // ==========================================================
            // =====       3. GUARDADO EN BASE DE DATOS (CON SAVE)  =====
            // ==========================================================
            $registro = new CausaMuerte();

            $registro->numero_entrada = $numero_entrada;
            $registro->numero_expediente = $numero_expediente;
            $registro->despacho = $despacho;
            $registro->fecha_ingreso_cadaver = $fecha_ingreso_cadaver;
            $registro->hora = $hora;
            $registro->delito = $delito;
            $registro->tipo_vehiculo = $tipo_vehiculo;
            $registro->fecha_suceso_transito = $fecha_suceso_transito;
            $registro->causa_muerte = $causa_muerte_presunta;
            $registro->mecanismo_causa_muerte = $mecanismo_causa_muerte;
            $registro->estado_id = $estado_id;
            $registro->municipio_id = $municipio_id;
            $registro->parroquia_id = $parroquia_id;
            $registro->sector_id = $sector_id;
            $registro->direccion_remocion_cadaver = $direccion_remocion_cadaver;
            $registro->categorizacion_referencias = $categorizacion_referencias;
            $registro->direccion_exacta = $direccion_exacta;
            $registro->nombres_apellidos = $nombres_apellidos;
            $registro->sexo = $sexo;
            $registro->embarazada = $embarazada;
            $registro->edad = $edad;
            $registro->edad_medida = $edad_medida;
            $registro->nacionalidad = $nacionalidad;
            $registro->tipo_identificacion = $tipo_identificacion;
            $registro->identificacion = $identificacion;
            $registro->nivel_instruccion = $nivel_instruccion;
            $registro->sitio_donde_laboraba = $sitio_donde_laboraba;
            $registro->descripcion = $descripcion;
            $registro->fecha_dictamen_muerte = $fecha_dictamen_muerte;
            $registro->hora_dictamen_muerte = $hora_dictamen_muerte;
            $registro->fases_descomposicion = $fases_descomposicion;
            $registro->observaciones = $observaciones;

            $registro->grupo_etario = $this->calcularGrupoEtario($edad, $edad_medida);
            $registro->user_id = Auth::id();

            $registro->save();

            return redirect()->route('causa_muerte.no_transito.index')->with('success', 'Registro por Tránsito creado con éxito.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(CausaMuerte $no_transito)
    {
        try {
            DB::transaction(function () use ($no_transito) {
                $no_transito->delete();
            });

            // CORRECCIÓN AQUÍ
            return redirect()->route('causa_muerte.no_transito.index')->with('success', 'Registro eliminado con éxito.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar registro de No Tránsito con ID ' . $no_transito->id . ': ' . $e->getMessage());

            // CORRECCIÓN AQUÍ
            return redirect()->route('causa_muerte.no_transito.index')->with('error', 'Hubo un error al eliminar el registro.');
        }
    }

    public function edit(CausaMuerte $no_transito)
    {
        // Cargamos los datos necesarios para los dropdowns
        $estados = Estado::orderBy('nombre')->get();

        return view('causa_muerte.no_transito.edit', compact('no_transito', 'estados'));
    }
    public function show(CausaMuerte $no_transito)
    {
        // Usamos load() para cargar eficientemente todas las relaciones
        // que necesitaremos mostrar en la vista (ej. nombres de locaciones).
        $no_transito->load(['estado', 'municipio', 'parroquia', 'sector', 'user']);

        return view('causa_muerte.no_transito.show', compact('no_transito'));
    }
    public function update(Request $request, CausaMuerte $no_transito)
    {
        try {
            // ==========================================================
            // =====    1. RECOLECCIÓN Y SANEAMIENTO DE DATOS       =====
            // ==========================================================
            $numero_entrada = trim(strtoupper($request->input('numero_entrada')));
            $despacho = $request->input('despacho');
            $numero_expediente = $request->input('numero_expediente') ? trim(strtoupper($request->input('numero_expediente'))) : null;
            $fecha_ingreso_cadaver = $request->input('fecha_ingreso_cadaver');
            $hora = $request->input('hora');
            $delito = $request->input('delito');
            $direccion_remocion_cadaver = $request->input('direccion_remocion_cadaver');
            $causa_muerte_presunta = $request->input('causa_muerte');
            $mecanismo_causa_muerte = $request->input('mecanismo_causa_muerte');
            $estado_id = $request->input('estado_id');
            $municipio_id = $request->input('municipio_id');
            $parroquia_id = $request->input('parroquia_id');
            $sector_id = $request->input('sector_id') ?: null;
            $direccion_exacta = trim(strtoupper($request->input('direccion_exacta')));
            $categorizacion_referencias = $request->input('categorizacion_referencias');
            $nombres_apellidos = $request->input('nombres_apellidos') ? trim(strtoupper($request->input('nombres_apellidos'))) : null;
            $sexo = $request->input('sexo');
            $embarazada = $request->input('embarazada');
            $edad = (int) $request->input('edad');
            $edad_medida = $request->input('edad_medida');
            $nacionalidad = $request->input('nacionalidad');
            $tipo_identificacion = $request->input('tipo_identificacion');
            $identificacion = $request->input('identificacion') ? trim(strtoupper($request->input('identificacion'))) : null;
            $nivel_instruccion = $request->input('nivel_instruccion');
            $sitio_donde_laboraba = $request->input('sitio_donde_laboraba');
            $descripcion = $request->input('descripcion') ? trim(strtoupper($request->input('descripcion'))) : null;
            $fecha_dictamen_muerte = $request->input('fecha_dictamen_muerte');
            $hora_dictamen_muerte = $request->input('hora_dictamen_muerte');
            $fases_descomposicion = $request->input('fases_descomposicion');
            $observaciones = $request->input('observaciones') ? trim(strtoupper($request->input('observaciones'))) : null;

            // ==========================================================
            // =====       2. VALIDACIÓN MANUAL CON ARRAY DE ERRORES  =====
            // ==========================================================
            $errores = [];
            if (empty($numero_entrada)) {
                $errores[] = 'El Número de Entrada es obligatorio.';
            }
            $existing = CausaMuerte::where('numero_entrada', $numero_entrada)->where('id', '!=', $no_transito->id)->first();
            if ($existing) {
                $errores[] = 'El Número de Entrada ya está en uso por otro registro.';
            }
            // ... (Añade aquí el resto de tus validaciones manuales)

            if (count($errores) > 0) {
                throw new \Exception(implode('<br>', $errores));
            }

            // ==========================================================
            // =====       3. GUARDADO EN BASE DE DATOS (CON SAVE)  =====
            // ==========================================================

            $registro = $no_transito; // Usamos el modelo existente que Laravel nos pasó

            // Asignamos las propiedades una por una
            $registro->numero_entrada = $numero_entrada;
            $registro->numero_expediente = $numero_expediente;
            $registro->despacho = $despacho;
            $registro->fecha_ingreso_cadaver = $fecha_ingreso_cadaver;
            $registro->hora = $hora;
            $registro->delito = $delito;
            $registro->direccion_remocion_cadaver = $direccion_remocion_cadaver;
            $registro->causa_muerte = $causa_muerte_presunta;
            $registro->mecanismo_causa_muerte = $mecanismo_causa_muerte;
            $registro->estado_id = $estado_id;
            $registro->municipio_id = $municipio_id;
            $registro->parroquia_id = $parroquia_id;
            $registro->sector_id = $sector_id;
            $registro->direccion_exacta = $direccion_exacta;
            $registro->categorizacion_referencias = $categorizacion_referencias;
            $registro->nombres_apellidos = $nombres_apellidos;
            $registro->sexo = $sexo;
            $registro->embarazada = $embarazada;
            $registro->edad = $edad;
            $registro->edad_medida = $edad_medida;
            $registro->nacionalidad = $nacionalidad;
            $registro->tipo_identificacion = $tipo_identificacion;
            $registro->identificacion = $identificacion;
            $registro->nivel_instruccion = $nivel_instruccion;
            $registro->sitio_donde_laboraba = $sitio_donde_laboraba;
            $registro->descripcion = $descripcion;
            $registro->fecha_dictamen_muerte = $fecha_dictamen_muerte;
            $registro->hora_dictamen_muerte = $hora_dictamen_muerte;
            $registro->fases_descomposicion = $fases_descomposicion;
            $registro->observaciones = $observaciones;

            // Calculamos y asignamos el grupo etario
            $registro->grupo_etario = $this->calcularGrupoEtario($edad, $edad_medida);

            // Guardamos los cambios
            $registro->save();

            return redirect()->route('causa_muerte.no_transito.index')->with('success', 'Registro actualizado con éxito.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Helper privado para calcular el grupo etario basado en la edad y la medida de tiempo.
     * Esta es la ÚNICA fuente de verdad para la lógica de negocio.
     *
     * @param int $edad
     * @param string $medida
     * @return string
     */
    private function calcularGrupoEtario(int $edad, string $medida): string
    {
        if ($medida === 'SE DESCONOCE') {
            return 'POR DETERMINAR';
        }

        // Si la medida no es en años (días, meses, etc.), se asume el primer rango.
        if ($medida !== 'AÑO (S)') {
            return '0 A 4';
        }

        // La expresión 'match' de PHP 8 es una forma moderna y limpia
        // de manejar múltiples condiciones if/elseif.
        return match (true) {
            $edad <= 4 => '0 A 4',
            $edad <= 9 => '5 A 9',
            $edad <= 14 => '10 A 14',
            $edad <= 19 => '15 A 19',
            $edad <= 24 => '20 A 24',
            $edad <= 29 => '25 A 29',
            $edad <= 34 => '30 A 34',
            $edad <= 39 => '35 A 39',
            $edad <= 44 => '40 A 44',
            $edad <= 49 => '45 A 49',
            $edad <= 54 => '50 A 54',
            $edad <= 59 => '55 A 59',
            $edad <= 64 => '60 A 64',
            $edad <= 69 => '65 A 69',
            $edad <= 74 => '70 A 74',
            $edad <= 79 => '75 A 79',
            default => '80 A MÁS',
        };
    }
}
// Los métodos store, show, edit, update y destroy se añadirán después.
