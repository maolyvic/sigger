<?php

namespace App\Http\Controllers\CausaMuerte;

use App\Http\Controllers\Controller;
use App\Models\CausaMuerte; // Asegúrate de tener este modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Sector;
class TransitoController extends Controller
{
    /**
     * Muestra la lista de registros de muerte por tránsito.
     */
    
    public function index()
    {
        return view('causa_muerte.transito.index');
    }
    public function getData()
    {
        // Iniciamos la consulta, filtrando solo por delito de TRÁNSITO
        $query = CausaMuerte::where('delito', 'TRÁNSITO');

        return DataTables::of($query)
            ->addColumn('action', function ($registro) {
                // Generamos el HTML para los botones de acción
                $editUrl = route('causa_muerte.transito.edit', $registro->id);
                $destroyUrl = route('causa_muerte.transito.destroy', $registro->id);
                return '
                    <div class="flex items-center space-x-4">
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
            // Le decimos a Datatables que la columna 'action' es HTML
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Muestra el formulario de creación.
     */
    public function create()
    {
        // Obtenemos los datos necesarios para los menús desplegables del formulario.
        // Es importante ordenarlos para una mejor experiencia de usuario.
        $estados = Estado::orderBy('nombre')->get();
        $municipios = Municipio::orderBy('nombre')->get();
        $parroquias = Parroquia::orderBy('nombre')->get();
        $sectores = Sector::orderBy('nombre')->get();

        // Pasamos todas las colecciones a la vista.
        return view('causa_muerte.transito.create', compact('estados', 'municipios', 'parroquias', 'sectores'));
    }

    /**
     * Guarda el nuevo registro en la base de datos.
     */
    public function store(Request $request)
    {
        try {
            // ==========================================================
            // =====    1. RECOLECCIÓN Y SANEAMIENTO DE DATOS       =====
            // ==========================================================
            $numero_entrada = trim(strtoupper($request->input('numero_entrada')));
            $despacho = $request->input('despacho') !== 'SELECCIONE...' ? $request->input('despacho') : null; // Asumiendo un valor por defecto
            $numero_expediente = $request->input('numero_expediente') ? trim(strtoupper($request->input('numero_expediente'))) : null;
            $fecha_ingreso_cadaver = $request->input('fecha_ingreso_cadaver');
            $hora = $request->input('hora');

            $delito = $request->input('delito');
            $direccion_remocion_cadaver = $request->input('direccion_remocion_cadaver');
            $causa_muerte_presunta = $request->input('causa_muerte'); // Renombrado para evitar conflicto
            $mecanismo_causa_muerte = $request->input('mecanismo_causa_muerte');
            $tipo_vehiculo = $request->input('tipo_vehiculo');
            $fecha_suceso_transito = $request->input('fecha_suceso_transito');

            $estado_id = $request->input('estado_id');
            $municipio_id = $request->input('municipio_id');
            $parroquia_id = $request->input('parroquia_id');
            $sector_id = $request->input('sector_id') ?: null; // Si es opcional
            $direccion_exacta = trim(strtoupper($request->input('direccion_exacta')));
            $categorizacion_referencias = $request->input('categorizacion_referencias');

            $nombres_apellidos = $request->input('nombres_apellidos') ? trim(strtoupper($request->input('nombres_apellidos'))) : null;
            $sexo = $request->input('sexo');
            $embarazada = $request->input('embarazada');
            $edad = (int) $request->input('edad');
            $edad_medida = $request->input('edad_medida');
            $tipo_identificacion = $request->input('tipo_identificacion');
            $nacionalidad = $request->input('nacionalidad');
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
            if (empty($fecha_ingreso_cadaver)) {
                $errores[] = 'La Fecha de Ingreso es obligatoria.';
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
            if ($edad < 0) {
                $errores[] = 'La Edad no puede ser negativa.';
            }
            if (empty($sexo)) {
                $errores[] = 'Debe seleccionar un Sexo.';
            }
            if ($sexo === 'FEMENINO' && empty($embarazada)) {
                $errores[] = 'Debe indicar si la persona estaba embarazada.';
            }
            // ... Puedes añadir tantas comprobaciones 'if' como necesites ...

            // Si hay errores, lanzamos una excepción
            if (count($errores) > 0) {
                throw new \Exception(implode('<br>', $errores));
            }

            // ==========================================================
            // =====       3. GUARDADO EN BASE DE DATOS (CON SAVE)  =====
            // ==========================================================

            $registro = new CausaMuerte();

            // Asignamos las propiedades una por una desde las variables saneadas
            $registro->numero_entrada = $numero_entrada;
            $registro->despacho = $despacho;
            $registro->numero_expediente = $numero_expediente;
            $registro->fecha_ingreso_cadaver = $fecha_ingreso_cadaver;
            $registro->hora = $hora;
            $registro->delito = $delito;
            $registro->direccion_remocion_cadaver = $direccion_remocion_cadaver;
            $registro->causa_muerte = $causa_muerte_presunta;
            $registro->mecanismo_causa_muerte = $mecanismo_causa_muerte;
            $registro->tipo_vehiculo = $tipo_vehiculo;
            $registro->fecha_suceso_transito = $fecha_suceso_transito;
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
            $registro->tipo_identificacion = $tipo_identificacion;
            $registro->nacionalidad = $nacionalidad;
            $registro->identificacion = $identificacion;
            $registro->nivel_instruccion = $nivel_instruccion;
            $registro->sitio_donde_laboraba = $sitio_donde_laboraba;
            $registro->descripcion = $descripcion;
            $registro->fecha_dictamen_muerte = $fecha_dictamen_muerte;
            $registro->hora_dictamen_muerte = $hora_dictamen_muerte;
            $registro->fases_descomposicion = $fases_descomposicion;
            $registro->observaciones = $observaciones;

            // Asignamos los datos calculados/fijos
            $registro->grupo_etario = $this->calcularGrupoEtario($edad, $edad_medida);
            $registro->user_id = Auth::id();

            $registro->save(); // Guardamos el registro en la base de datos

            return redirect()->route('causa_muerte.transito.index')->with('success', 'Registro por Tránsito creado con éxito.');
        } catch (\Exception $e) {
            // Capturamos la excepción (ya sea de la validación o de la BD)
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Helper privado para calcular el grupo etario.
     * Esta es la ÚNICA fuente de verdad para la lógica de negocio.
     */
    

     /* @param  \App\Models\CausaMuerte  $transito El registro a eliminar (Route-Model Binding)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CausaMuerte $transito)
    {
        try {
            // Usamos una transacción para garantizar la integridad.
            DB::transaction(function () use ($transito) {
                // Como el modelo CausaMuerte usa SoftDeletes,
                // esto no borrará el registro, solo establecerá el 'deleted_at'.
                $transito->delete();
            });

            return redirect()->route('causa_muerte.transito.index')
                             ->with('success', 'Registro eliminado con éxito.');

        } catch (\Exception $e) {
            // Registramos el error para futura depuración.
            Log::error('Error al eliminar registro de Tránsito con ID ' . $transito->id . ': ' . $e->getMessage());

            return redirect()->route('causa_muerte.transito.index')
                             ->with('error', 'Hubo un error inesperado al eliminar el registro.');
        }
    }
        /**
     * Muestra el formulario para editar un registro existente.
     *
     * @param  \App\Models\CausaMuerte  $transito
     * @return \Illuminate\View\View
     */
    public function edit(CausaMuerte $transito)
    {
        // Cargamos los datos necesarios para todos los dropdowns
        $estados = Estado::orderBy('nombre')->get();
        // NOTA: Los dropdowns anidados se cargarán vía Ajax, pero pasamos
        // la lista inicial de estados.
        
        return view('causa_muerte.transito.edit', compact('transito', 'estados'));
    }

    /**
     * Actualiza el registro en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CausaMuerte  $transito
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CausaMuerte $transito)
    {
        // VALIDACIÓN (la regla 'unique' debe ignorar el registro actual)
        $validatedData = $request->validate([
            'numero_entrada' => ['required', 'string', 'max:255', Rule::unique('causa_muerte')->ignore($transito->id)],
            // ... aquí irían todas las demás reglas de validación, igual que en store() ...
            'edad' => 'required|integer|min:0',
            'edad_medida' => 'required|in:AÑO (S),MES (ES),DÍA (S),MES (ES) DE GESTACIÓN,SE DESCONOCE',
        ]);

        try {
            DB::transaction(function () use ($request, $transito) {
                // Obtenemos todos los datos del formulario
                $data = $request->all();

                // Calculamos el grupo etario en el backend
                $data['grupo_etario'] = $this->calcularGrupoEtario(
                    (int) $request->input('edad'),
                    $request->input('edad_medida')
                );
                
                // Actualizamos el registro con los nuevos datos
                $transito->update($data);
            });

            return redirect()->route('causa_muerte.transito.index')->with('success', 'Registro actualizado con éxito.');

        } catch (\Exception $e) {
            Log::error('Error al actualizar registro de Tránsito con ID ' . $transito->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al actualizar el registro.')->withInput();
        }
    }
    private function calcularGrupoEtario(int $edad, string $medida): string
    {
        if ($medida === 'SE DESCONOCE') {
            return 'POR DETERMINAR';
        }

        if ($medida !== 'AÑO (S)') {
            return '0 A 4';
        }

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
