<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editando Registro de Tránsito: N° Entrada {{ $transito->numero_entrada }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <strong class="font-bold">¡Error de validación!</strong> Revisa los campos del formulario.
                    </div>
                    @endif

                    <form action="{{ route('causa_muerte.transito.update', $transito) }}" method="POST" x-data="{ sexo: '{{ old('sexo', $transito->sexo) }}' }">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="delito" value="TRÁNSITO">

                        <div class="space-y-10">


                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Generales de Ingreso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="numero_entrada" class="block text-sm font-medium text-gray-700">Número de Entrada</label>
                                        <input type="text" name="numero_entrada" id="numero_entrada" value="{{ old('numero_entrada', $transito->numero_entrada) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="numero_expediente" class="block text-sm font-medium text-gray-700">Número de Expediente</label>
                                        <input type="text" name="numero_expediente" id="numero_expediente" value="{{ old('numero_expediente', $transito->numero_expediente) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div>
                                        <label for="despacho" class="block text-sm font-medium text-gray-700">Despacho</label>
                                        <select name="despacho" id="despacho" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['SENAMECF', 'CICPC', 'CPNB', 'GNB', 'OTROS'] as $option)
                                            <option value="{{ $option }}" {{ old('despacho', $transito->despacho) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="fecha_ingreso_cadaver" class="block text-sm font-medium text-gray-700">Fecha de Ingreso del Cadáver</label>
                                        <input type="date" name="fecha_ingreso_cadaver" id="fecha_ingreso_cadaver" value="{{ old('fecha_ingreso_cadaver', $transito->fecha_ingreso_cadaver) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="hora" class="block text-sm font-medium text-gray-700">Hora de Ingreso</label>
                                        <input type="time" name="hora" id="hora" value="{{ old('hora', $transito->hora) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                </div>
                            </section>
                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Suceso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="tipo_vehiculo" class="block text-sm font-medium text-gray-700">Tipo de Vehículo</label>
                                        <select name="tipo_vehiculo" id="tipo_vehiculo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['AUTOMÓVIL', 'MOTO', 'CAMIONETA', 'CAMIÓN', 'NO', 'POR DETERMINAR'] as $option)
                                            <option value="{{ $option }}" {{ old('tipo_vehiculo', $transito->tipo_vehiculo) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="fecha_suceso_transito" class="block text-sm font-medium text-gray-700">Fecha del Suceso</label>

                                        <input type="date" name="fecha_suceso_transito" id="fecha_suceso_transito" value="old('fecha_suceso_transito', $transito->fecha_suceso_transito) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>


                                    <div>
                                        <label for="causa_muerte" class="block text-sm font-medium text-gray-700">Causa de Muerte Presunta</label>
                                        <select name="causa_muerte" id="causa_muerte" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['HXAF', 'HXAB', 'A DETERMINAR', 'AHORCADO', 'POLITRAUMATISMO', 'NATURAL', 'AHOGADO', 'QUEMADO', 'ELECTROCUTADO', 'HIPOTERMÍA', 'ASFIXIA MÉCANICA', 'ESTRANGULAMIENTO', 'ENVENENAMIENTO'] as $option)
                                            <option value="{{ $option }}" {{ old('causa_muerte', $transito->causa_muerte) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="mecanismo_causa_muerte" class="block text-sm font-medium text-gray-700">Mecanismo de la Causa de Muerte</label>
                                        <select name="mecanismo_causa_muerte" id="mecanismo_causa_muerte" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['CAÍDA DE ALTURA', 'CAÍDA DE SUS PROPIOS PIES', 'OBJETO CONTUNDENTE', 'ARROLLAMIENTO DE METRO', 'LINCHAMIENTO', 'INHALACIÓN DE GASES', 'TRAUMA TÉRMICO', 'APLASTAMIENTO', 'TERREMOTO', 'ACCIDENTE AÉREO', 'INUNDACIÓN', 'RAYOS', 'INCENDIO', 'INTOXICACIÓN EXÓGENA', 'EXPLOSIÓN', 'ACCIDENTE DE TRÁNSITO', 'ABALANZAMIENTO', 'TAPIADO', 'SE DESCONOCE', 'ASFIXIA MÉCANICA', 'OTROS'] as $option)
                                            <option value="{{ $option }}" {{ old('mecanismo_causa_muerte', $transito->mecanismo_causa_muerte) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </section>
                            {{-- ... SECCIONES: DATOS DEL SUCESO Y LOCACIÓN ... --}}
                            <section id="location-wrapper">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos de Locación del Suceso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                    <div>
                                        <label for="estado_id" class="block text-sm font-medium text-gray-700">Estado</label>
                                        <select name="estado_id" id="estado_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                            <option value="">Seleccione un Estado...</option>
                                            @foreach ($estados as $estado)
                                            <option value="{{ $estado->id }}" {{ old('estado_id', $transito->estado_id) == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="municipio_id" class="block text-sm font-medium text-gray-700">Municipio</label>
                                        <select name="municipio_id" id="municipio_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm disabled:bg-gray-100" disabled required>
                                            <option value="">Seleccione...</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="parroquia_id" class="block text-sm font-medium text-gray-700">Parroquia</label>
                                        <select name="parroquia_id" id="parroquia_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm disabled:bg-gray-100" disabled required>
                                            <option value="">Seleccione...</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="sector_id" class="block text-sm font-medium text-gray-700">Sector</label>
                                        <select name="sector_id" id="sector_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm disabled:bg-gray-100" disabled>
                                            <option value="">Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    <div>
                                        <label for="direccion_remocion_cadaver" class="block text-sm font-medium text-gray-700">Lugar de Remoción</label>
                                        <select name="direccion_remocion_cadaver" id="direccion_remocion_cadaver" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach(['AMBULATORIO', 'CDI', 'CENTRO PENITENCIARIO', 'CICPC', 'CLINICA', 'HOSPITAL', 'NO DECLARADO', 'OTROS', 'CPNB', 'GNB', 'VIA PUBLICA'] as $option)
                                            <option value="{{ $option }}" {{ old('direccion_remocion_cadaver', $transito->direccion_remocion_cadaver) == $option ? 'selected' : '' }}>{{ $option }}</option> --}}
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- CAMPO AÑADIDO --}}
                                    <div>
                                        <label for="categorizacion_referencias" class="block text-sm font-medium text-gray-700">Categorización del Sitio</label>
                                        <select name="categorizacion_referencias" id="categorizacion_referencias" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach(['BARRIO O CASERÍO', 'CENTRO DE SALUD', 'CENTRO PENITENCIARIO', 'GRAN MISIÓN VIVIENDA VENEZUELA (GMVV)', 'HOTEL O POSADA', 'INSTALACIONES DEL ESTADO VENEZOLANO', 'INTERIOR DE VEHÍCULO', 'URBANIZACIÓN O CONJUNTO RESIDENCIAL', 'VÍA PÚBLICA', 'OTROS'] as $option)
                                            <option value="{{ $option }}" {{ old('categorizacion_referencias', $transito->categorizacion_referencias) == $option ? 'selected' : '' }}>{{ $option }}</option> --}}
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="direccion_exacta" class="block text-sm font-medium text-gray-700">Dirección Exacta</label>
                                        <input type="text" name="direccion_exacta" id="direccion_exacta" value="{{ old('direccion_exacta', $transito->direccion_exacta) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                            </section>

                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Occiso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="md:col-span-3">
                                        <label for="nombres_apellidos" class="block text-sm font-medium text-gray-700">Nombres y Apellidos</label>
                                        <input type="text" name="nombres_apellidos" id="nombres_apellidos" value="{{ old('nombres_apellidos', $transito->nombres_apellidos) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="col-span-2">
                                            <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                                            <input type="number" name="edad" id="edad" value="{{ old('edad', $transito->edad) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                        </div>
                                        <div>
                                            <label for="edad_medida" class="block text-sm font-medium text-gray-700">Medida</label>
                                            <select name="edad_medida" id="edad_medida" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                                @foreach (['AÑO (S)', 'MES (ES)', 'DÍA (S)', 'MES (ES) DE GESTACIÓN', 'SE DESCONOCE'] as $option)
                                                <option value="{{ $option }}" {{ old('edad_medida', $transito->edad_medida) == $option ? 'selected' : '' }}>{{ str_replace('_', ' ', $option) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                                        <select name="sexo" id="sexo" x-model="sexo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                            @foreach (['MASCULINO', 'FEMENINO', 'POR DETERMINAR', 'SE DESCONOCE'] as $option)
                                            <option value="{{ $option }}" {{ old('sexo', $transito->sexo) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div x-show="sexo === 'FEMENINO'" style="display: none;">
                                        <label for="embarazada" class="block text-sm font-medium text-gray-700">¿Embarazada?</label>
                                        <select name="embarazada" id="embarazada" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            <option value="NO" {{ old('embarazada', $transito->embarazada) == 'NO' ? 'selected' : '' }}>NO</option>
                                            <option value="SI" {{ old('embarazada', $transito->embarazada) == 'SI' ? 'selected' : '' }}>SI</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="nacionalidad" class="block text-sm font-medium text-gray-700">Nacionalidad</label>
                                        <select name="nacionalidad" id="nacionalidad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['VENEZOLANA', 'EXTRANJERA', 'POR DETERMINAR', 'SE DESCONOCE'] as $option)
                                            <option value="{{ $option }}" {{ old('nacionalidad', $transito->nacionalidad) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="tipo_identificacion" class="block text-sm font-medium text-gray-700">Tipo de Identificación</label>
                                        <select name="tipo_identificacion" id="tipo_identificacion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['CÉDULA', 'PASAPORTE', 'PARTIDA DE NACIMIENTO', 'NO IDENTIFICADO'] as $option)
                                            <option value="{{ $option }}" {{ old('tipo_identificacion', $transito->tipo_identificacion) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="identificacion" class="block text-sm font-medium text-gray-700">N° de Identificación</label>
                                        <input type="text" name="identificacion" id="identificacion" value="{{ old('identificacion', $transito->identificacion) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="sitio_donde_laboraba" class="block text-sm font-medium text-gray-700">Sitio Donde Laboraba</label>
                                        <select name="sitio_donde_laboraba" id="sitio_donde_laboraba" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['CUERPO DE SEGURIDAD CIUDADANA', 'SERVIDOR PÚBLICO', 'EMPRESA PRIVADA', 'DETENIDO'] as $option)
                                            <option value="{{ $option }}" {{ old('sitio_donde_laboraba', $transito->sitio_donde_laboraba) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="nivel_instruccion" class="block text-sm font-medium text-gray-700">Nivel de Instrucción</label>
                                        <select name="nivel_instruccion" id="nivel_instruccion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['SIN ESTUDIOS', 'BÁSICA', 'BACHILLER', 'UNIVERSITARIO', 'SIN INFORMACIÓN'] as $option)
                                            <option value="{{ $option }}" {{ old('nivel_instruccion', $transito->nivel_instruccion) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción de Vestimentas y Pertinencias</label>
                                        <textarea name="descripcion" id="descripcion" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion', $transito->descripcion) }}</textarea>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Finales y Observaciones</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="fecha_dictamen_muerte" class="block text-sm font-medium text-gray-700">Fecha Dictamen de Muerte</label>
                                        <input type="date" name="fecha_dictamen_muerte" id="fecha_dictamen_muerte" value="{{ old('fecha_dictamen_muerte', $transito->fecha_dictamen_muerte) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="hora_dictamen_muerte" class="block text-sm font-medium text-gray-700">Hora Dictamen de Muerte</label>
                                        <input type="time" name="hora_dictamen_muerte" id="hora_dictamen_muerte" value="{{ old('hora_dictamen_muerte', $transito->hora_dictamen_muerte) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="fases_descomposicion" class="block text-sm font-medium text-gray-700">Fase de Descomposición</label>
                                        <select name="fases_descomposicion" id="fases_descomposicion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['FRESCO', 'PUTREFACTO', 'OSAMENTO'] as $option)
                                            <option value="{{ $option }}" {{ old('fases_descomposicion', $transito->fases_descomposicion) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                                        <textarea name="observaciones" id="observaciones" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('observaciones', $transito->observaciones) }}</textarea>
                                    </div>
                                </div>
                            </section>

                            <div class="flex justify-end space-x-4 pt-4 border-t">
                                <a href="{{ route('causa_muerte.transito.index') }}" class="px-4 py-2 border rounded-md text-sm">Cancelar</a>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">Actualizar Registro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
    <script>
        $(document).ready(function() {
            // ---- VALORES GUARDADOS O DE UNA VALIDACIÓN FALLIDA ----
            const selectedMunicipioId = "{{ old('municipio_id', $transito->municipio_id) }}";
            const selectedParroquiaId = "{{ old('parroquia_id', $transito->parroquia_id) }}";
            const selectedSectorId = "{{ old('sector_id', $transito->sector_id) }}";

            // ---- REFERENCIAS A LOS DROPDOWNS ----
            const estadoDropdown = $('#estado_id');
            const municipioDropdown = $('#municipio_id');
            const parroquiaDropdown = $('#parroquia_id');
            const sectorDropdown = $('#sector_id');

            // ---- FUNCIÓN GENÉRICA PARA POBLAR DROPDOWNS ----
            function populateDropdown(dropdown, data, selectedValue = null) {
                dropdown.empty().append('<option value="">Seleccione...</option>');
                $.each(data, function(key, value) {
                    const option = $('<option></option>').attr('value', value.id).text(value.nombre);
                    // Usamos '==' para comparar de forma flexible string con número
                    if (value.id == selectedValue) {
                        option.prop('selected', true);
                    }
                    dropdown.append(option);
                });
                dropdown.prop('disabled', false);
            }

            // ---- EVENTO: CUANDO SE CAMBIA EL ESTADO ----
            estadoDropdown.on('change', function() {
                const estadoId = $(this).val();
                municipioDropdown.prop('disabled', true).empty().append('<option value="">Cargando...</option>');
                parroquiaDropdown.prop('disabled', true).empty();
                sectorDropdown.prop('disabled', true).empty();

                if (estadoId) {
                    $.getJSON('/api/locations/estados/' + estadoId + '/municipios', function(data) {
                        populateDropdown(municipioDropdown, data, selectedMunicipioId);
                        // Si se seleccionó un valor, disparamos el siguiente evento en la cadena
                        if (municipioDropdown.val()) {
                            municipioDropdown.trigger('change');
                        }
                    });
                }
            });

            // ---- EVENTO: CUANDO SE CAMBIA EL MUNICIPIO ----
            municipioDropdown.on('change', function() {
                const municipioId = $(this).val();
                parroquiaDropdown.prop('disabled', true).empty().append('<option value="">Cargando...</option>');
                sectorDropdown.prop('disabled', true).empty();

                if (municipioId) {
                    $.getJSON('/api/locations/municipios/' + municipioId + '/parroquias', function(data) {
                        populateDropdown(parroquiaDropdown, data, selectedParroquiaId);
                        // Si se seleccionó un valor, disparamos el siguiente evento en la cadena
                        if (parroquiaDropdown.val()) {
                            parroquiaDropdown.trigger('change');
                        }
                    });
                }
            });

            // ---- EVENTO: CUANDO SE CAMBIA LA PARROQUIA ----
            parroquiaDropdown.on('change', function() {
                const parroquiaId = $(this).val();
                sectorDropdown.prop('disabled', true).empty().append('<option value="">Cargando...</option>');

                if (parroquiaId) {
                    $.getJSON('/api/locations/parroquias/' + parroquiaId + '/sectores', function(data) {
                        populateDropdown(sectorDropdown, data, selectedSectorId);
                    });
                }
            });

            // ---- EJECUCIÓN INICIAL AL CARGAR LA PÁGINA ----
            // Esto inicia la cascada
            if (estadoDropdown.val()) {
                estadoDropdown.trigger('change');
            }
        });
    </script>
    @endpush
</x-app-layout>