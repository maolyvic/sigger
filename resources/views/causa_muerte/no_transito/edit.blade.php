<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editando Registro: N° Entrada {{ $no_transito->numero_entrada }}
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

                    <form action="{{ route('causa_muerte.no_transito.update', $no_transito) }}" method="POST" x-data="formData()">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="grupo_etario" :value="grupoEtario">

                        <div class="space-y-10">

                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Generales de Ingreso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="numero_entrada" class="block text-sm font-medium text-gray-700">Número de Entrada</label>
                                        <input type="text" name="numero_entrada" id="numero_entrada" value="{{ old('numero_entrada', $no_transito->numero_entrada) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="numero_expediente" class="block text-sm font-medium text-gray-700">Número de Expediente</label>
                                        <input type="text" name="numero_expediente" id="numero_expediente" value="{{ old('numero_expediente', $no_transito->numero_expediente) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div>
                                        <label for="despacho" class="block text-sm font-medium text-gray-700">Despacho</label>
                                        <select name="despacho" id="despacho" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['SENAMECF', 'CICPC', 'CPNB', 'GNB', 'OTROS'] as $option)
                                                <option value="{{ $option }}" {{ old('despacho', $no_transito->despacho) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="fecha_ingreso_cadaver" class="block text-sm font-medium text-gray-700">Fecha de Ingreso del Cadáver</label>
                                        <input type="date" name="fecha_ingreso_cadaver" id="fecha_ingreso_cadaver" value="{{ old('fecha_ingreso_cadaver', $no_transito->fecha_ingreso_cadaver) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="hora" class="block text-sm font-medium text-gray-700">Hora de Ingreso</label>
                                        <input type="time" name="hora" id="hora" value="{{ old('hora', $no_transito->hora) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Suceso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="delito" class="block text-sm font-medium text-gray-700">Delito</label>
                                        <select name="delito" id="delito" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                            @foreach (['HOMICIDIO', 'SUICIDIO', 'INTERVENCIÓN LEGAL', 'A DETERMINAR', 'RESPONSABILIDAD PROFESIONAL', 'NATURAL', 'ACCIDENTAL'] as $option)
                                                <option value="{{ $option }}" {{ old('delito', $no_transito->delito) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="causa_muerte" class="block text-sm font-medium text-gray-700">Causa de Muerte Presunta</label>
                                        <select name="causa_muerte" id="causa_muerte" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                             @foreach (['HXAF', 'HXAB', 'A DETERMINAR', 'AHORCADO', 'POLITRAUMATISMO', 'NATURAL', 'AHOGADO', 'QUEMADO', 'ELECTROCUTADO', 'HIPOTERMÍA', 'ASFIXIA MÉCANICA', 'ESTRANGULAMIENTO', 'ENVENENAMIENTO'] as $option)
                                                <option value="{{ $option }}" {{ old('causa_muerte', $no_transito->causa_muerte) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="mecanismo_causa_muerte" class="block text-sm font-medium text-gray-700">Mecanismo de la Causa de Muerte</label>
                                        <select name="mecanismo_causa_muerte" id="mecanismo_causa_muerte" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['CAÍDA DE ALTURA', 'CAÍDA DE SUS PROPIOS PIES', 'OBJETO CONTUNDENTE', 'ARROLLAMIENTO DE METRO', 'LINCHAMIENTO', 'INHALACIÓN DE GASES', 'TRAUMA TÉRMICO', 'APLASTAMIENTO', 'TERREMOTO', 'ACCIDENTE AÉREO', 'INUNDACIÓN', 'RAYOS', 'INCENDIO', 'INTOXICACIÓN EXÓGENA', 'EXPLOSIÓN', 'ACCIDENTE DE TRÁNSITO', 'ABALANZAMIENTO', 'TAPIADO', 'SE DESCONOCE', 'ASFIXIA MÉCANICA', 'OTROS'] as $option)
                                                <option value="{{ $option }}" {{ old('mecanismo_causa_muerte', $no_transito->mecanismo_causa_muerte) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </section>

                            <section id="location-wrapper">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos de Locación del Suceso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                    <div>
                                        <label for="estado_id" class="block text-sm font-medium text-gray-700">Estado</label>
                                        <select name="estado_id" id="estado_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                            @foreach ($estados as $estado)
                                                <option value="{{ $estado->id }}" {{ old('estado_id', $no_transito->estado_id) == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="municipio_id" class="block text-sm font-medium text-gray-700">Municipio</label>
                                        <select name="municipio_id" id="municipio_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm disabled:bg-gray-100" disabled required></select>
                                    </div>
                                    <div>
                                        <label for="parroquia_id" class="block text-sm font-medium text-gray-700">Parroquia</label>
                                        <select name="parroquia_id" id="parroquia_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm disabled:bg-gray-100" disabled required></select>
                                    </div>
                                    <div>
                                        <label for="sector_id" class="block text-sm font-medium text-gray-700">Sector</label>
                                        <select name="sector_id" id="sector_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm disabled:bg-gray-100" disabled></select>
                                    </div>
                                </div>
                                 <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    <div>
                                        <label for="direccion_remocion_cadaver" class="block text-sm font-medium text-gray-700">Lugar de Remoción</label>
                                        <select name="direccion_remocion_cadaver" id="direccion_remocion_cadaver" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach(['AMBULATORIO', 'CDI', 'CENTRO PENITENCIARIO', 'CICPC', 'CLINICA', 'HOSPITAL', 'NO DECLARADO', 'OTROS', 'CPNB', 'GNB', 'VIA PUBLICA'] as $option)
                                                <option value="{{ $option }}" {{ old('direccion_remocion_cadaver', $no_transito->direccion_remocion_cadaver) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="categorizacion_referencias" class="block text-sm font-medium text-gray-700">Categorización del Sitio</label>
                                        <select name="categorizacion_referencias" id="categorizacion_referencias" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach(['BARRIO O CASERÍO', 'CENTRO DE SALUD', 'CENTRO PENITENCIARIO', 'GRAN MISIÓN VIVIENDA VENEZUELA (GMVV)', 'HOTEL O POSADA', 'INSTALACIONES DEL ESTADO VENEZOLANO', 'INTERIOR DE VEHÍCULO', 'URBANIZACIÓN O CONJUNTO RESIDENCIAL', 'VÍA PÚBLICA', 'OTROS'] as $option)
                                                <option value="{{ $option }}" {{ old('categorizacion_referencias', $no_transito->categorizacion_referencias) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="direccion_exacta" class="block text-sm font-medium text-gray-700">Dirección Exacta</label>
                                        <input type="text" name="direccion_exacta" id="direccion_exacta" value="{{ old('direccion_exacta', $no_transito->direccion_exacta) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                 </div>
                            </section>
                            
                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Occiso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="md:col-span-3">
                                        <label for="nombres_apellidos" class="block text-sm font-medium text-gray-700">Nombres y Apellidos</label>
                                        <input type="text" name="nombres_apellidos" id="nombres_apellidos" value="{{ old('nombres_apellidos', $no_transito->nombres_apellidos) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="col-span-2">
                                            <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                                            <input type="number" name="edad" id="edad" x-model.lazy="edad" @input="validarEdad" value="{{ old('edad', $no_transito->edad) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                        </div>
                                        <div>
                                            <label for="edad_medida" class="block text-sm font-medium text-gray-700">Medida</label>
                                            <select name="edad_medida" id="edad_medida" x-model="medida" @change="calcularGrupoEtario" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                                @foreach (['AÑO (S)', 'MES (ES)', 'DÍA (S)', 'MES (ES) DE GESTACIÓN', 'SE DESCONOCE'] as $option)
                                                    <option value="{{ $option }}" {{ old('edad_medida', $no_transito->edad_medida) == $option ? 'selected' : '' }}>{{ str_replace('_', ' ', $option) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                                        <select name="sexo" id="sexo" x-model="sexo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                            @foreach (['MASCULINO', 'FEMENINO', 'POR DETERMINAR', 'SE DESCONOCE'] as $option)
                                                <option value="{{ $option }}" {{ old('sexo', $no_transito->sexo) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div x-show="sexo === 'FEMENINO'" style="display: none;">
                                        <label for="embarazada" class="block text-sm font-medium text-gray-700">¿Embarazada?</label>
                                        <select name="embarazada" id="embarazada" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            <option value="NO" {{ old('embarazada', $no_transito->embarazada) == 'NO' ? 'selected' : '' }}>NO</option>
                                            <option value="SI" {{ old('embarazada', $no_transito->embarazada) == 'SI' ? 'selected' : '' }}>SI</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="nacionalidad" class="block text-sm font-medium text-gray-700">Nacionalidad</label>
                                        <select name="nacionalidad" id="nacionalidad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                             @foreach (['VENEZOLANA', 'EXTRANJERA', 'POR DETERMINAR', 'SE DESCONOCE'] as $option)
                                                <option value="{{ $option }}" {{ old('nacionalidad', $no_transito->nacionalidad) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="tipo_identificacion" class="block text-sm font-medium text-gray-700">Tipo de Identificación</label>
                                        <select name="tipo_identificacion" id="tipo_identificacion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['CÉDULA', 'PASAPORTE', 'PARTIDA DE NACIMIENTO', 'NO IDENTIFICADO'] as $option)
                                                <option value="{{ $option }}" {{ old('tipo_identificacion', $no_transito->tipo_identificacion) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="identificacion" class="block text-sm font-medium text-gray-700">N° de Identificación</label>
                                        <input type="text" name="identificacion" id="identificacion" value="{{ old('identificacion', $no_transito->identificacion) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="sitio_donde_laboraba" class="block text-sm font-medium text-gray-700">Sitio Donde Laboraba</label>
                                        <select name="sitio_donde_laboraba" id="sitio_donde_laboraba" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['CUERPO DE SEGURIDAD CIUDADANA', 'SERVIDOR PÚBLICO', 'EMPRESA PRIVADA', 'DETENIDO'] as $option)
                                                <option value="{{ $option }}" {{ old('sitio_donde_laboraba', $no_transito->sitio_donde_laboraba) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     <div>
                                        <label for="nivel_instruccion" class="block text-sm font-medium text-gray-700">Nivel de Instrucción</label>
                                        <select name="nivel_instruccion" id="nivel_instruccion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['SIN ESTUDIOS', 'BÁSICA', 'BACHILLER', 'UNIVERSITARIO', 'SIN INFORMACIÓN'] as $option)
                                                <option value="{{ $option }}" {{ old('nivel_instruccion', $no_transito->nivel_instruccion) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción de Vestimentas y Pertinencias</label>
                                        <textarea name="descripcion" id="descripcion" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion', $no_transito->descripcion) }}</textarea>
                                    </div>
                                </div>
                            </section>

                            <section>
                                 <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Finales y Observaciones</h3>
                                 <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="fecha_dictamen_muerte" class="block text-sm font-medium text-gray-700">Fecha Dictamen de Muerte</label>
                                        <input type="date" name="fecha_dictamen_muerte" id="fecha_dictamen_muerte" value="{{ old('fecha_dictamen_muerte', $no_transito->fecha_dictamen_muerte) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="hora_dictamen_muerte" class="block text-sm font-medium text-gray-700">Hora Dictamen de Muerte</label>
                                        <input type="time" name="hora_dictamen_muerte" id="hora_dictamen_muerte" value="{{ old('hora_dictamen_muerte', $no_transito->hora_dictamen_muerte) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                     <div>
                                        <label for="fases_descomposicion" class="block text-sm font-medium text-gray-700">Fase de Descomposición</label>
                                        <select name="fases_descomposicion" id="fases_descomposicion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['FRESCO', 'PUTREFACTO', 'OSAMENTO'] as $option)
                                                <option value="{{ $option }}" {{ old('fases_descomposicion', $no_transito->fases_descomposicion) == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                                        <textarea name="observaciones" id="observaciones" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('observaciones', $no_transito->observaciones) }}</textarea>
                                    </div>
                                 </div>
                            </section>

                            <div class="flex justify-end space-x-4 pt-4 border-t">
                                <a href="{{ route('causa_muerte.no_transito.index') }}" class="px-4 py-2 border rounded-md text-sm">Cancelar</a>
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
        // LÓGICA DE ALPINE.JS
        function formData() {
            return {
                sexo: '{{ old('sexo', $no_transito->sexo) }}',
                edad: '{{ old('edad', $no_transito->edad) }}',
                medida: '{{ old('edad_medida', $no_transito->edad_medida ?? 'AÑO (S)') }}',
                grupoEtario: '', // Se inicializa vacío y se calcula al cargar

                init() {
                    this.calcularGrupoEtario();
                },

                calcularGrupoEtario() {
                    if (this.medida === 'SE DESCONOCE') {
                        this.grupoEtario = 'POR DETERMINAR';
                        this.bloquearEdad(true);
                        return;
                    } else {
                        this.bloquearEdad(false);
                    }
                    const edadNum = parseInt(this.edad);
                    if (isNaN(edadNum) || edadNum < 0) {
                        this.grupoEtario = 'Ingrese una edad válida';
                        return;
                    }
                    if (this.medida !== 'AÑO (S)') {
                        this.grupoEtario = '0 A 4';
                        return;
                    }
                    if (edadNum <= 4) this.grupoEtario = '0 A 4';
                    else if (edadNum <= 9) this.grupoEtario = '5 A 9';
                    else if (edadNum <= 14) this.grupoEtario = '10 A 14';
                    else if (edadNum <= 19) this.grupoEtario = '15 A 19';
                    else if (edadNum <= 24) this.grupoEtario = '20 A 24';
                    else if (edadNum <= 29) this.grupoEtario = '25 A 29';
                    else if (edadNum <= 34) this.grupoEtario = '30 A 34';
                    else if (edadNum <= 39) this.grupoEtario = '35 A 39';
                    else if (edadNum <= 44) this.grupoEtario = '40 A 44';
                    else if (edadNum <= 49) this.grupoEtario = '45 A 49';
                    else if (edadNum <= 54) this.grupoEtario = '50 A 54';
                    else if (edadNum <= 59) this.grupoEtario = '55 A 59';
                    else if (edadNum <= 64) this.grupoEtario = '60 A 64';
                    else if (edadNum <= 69) this.grupoEtario = '65 A 69';
                    else if (edadNum <= 74) this.grupoEtario = '70 A 74';
                    else if (edadNum <= 79) this.grupoEtario = '75 A 79';
                    else this.grupoEtario = '80 A MÁS';
                },

                validarEdad() {
                    if (parseInt(this.edad) < 0) {
                        this.edad = 0;
                    }
                    this.calcularGrupoEtario();
                },

                bloquearEdad(bloquear) {
                    const edadInput = document.getElementById('edad');
                    if (bloquear) {
                        this.edad = 0;
                        edadInput.setAttribute('readonly', true);
                        edadInput.classList.add('bg-gray-100');
                    } else {
                        edadInput.removeAttribute('readonly');
                        edadInput.classList.remove('bg-gray-100');
                    }
                }
            }
        }

        // LÓGICA DE JQUERY PARA DROPDOWNS
        $(document).ready(function() {
            const selectedMunicipioId = "{{ old('municipio_id', $no_transito->municipio_id) }}";
            const selectedParroquiaId = "{{ old('parroquia_id', $no_transito->parroquia_id) }}";
            const selectedSectorId = "{{ old('sector_id', $no_transito->sector_id) }}";

            const estadoDropdown = $('#estado_id');
            const municipioDropdown = $('#municipio_id');
            const parroquiaDropdown = $('#parroquia_id');
            const sectorDropdown = $('#sector_id');

            function populateDropdown(dropdown, data, selectedValue = null) {
                dropdown.empty().append('<option value="">Seleccione...</option>');
                $.each(data, function(key, value) {
                    const option = $('<option></option>').attr('value', value.id).text(value.nombre);
                    if (value.id == selectedValue) {
                        option.prop('selected', true);
                    }
                    dropdown.append(option);
                });
                dropdown.prop('disabled', false);
            }

            estadoDropdown.on('change', function() {
                const estadoId = $(this).val();
                municipioDropdown.prop('disabled', true).empty().append('<option value="">Cargando...</option>');
                parroquiaDropdown.prop('disabled', true).empty();
                sectorDropdown.prop('disabled', true).empty();

                if (estadoId) {
                    $.getJSON('/api/locations/estados/' + estadoId + '/municipios', function(data) {
                        populateDropdown(municipioDropdown, data, selectedMunicipioId);
                        if (municipioDropdown.val()) {
                            municipioDropdown.trigger('change');
                        }
                    });
                }
            });

            municipioDropdown.on('change', function() {
                const municipioId = $(this).val();
                parroquiaDropdown.prop('disabled', true).empty().append('<option value="">Cargando...</option>');
                sectorDropdown.prop('disabled', true).empty();

                if (municipioId) {
                    $.getJSON('/api/locations/municipios/' + municipioId + '/parroquias', function(data) {
                        populateDropdown(parroquiaDropdown, data, selectedParroquiaId);
                        if (parroquiaDropdown.val()) {
                            parroquiaDropdown.trigger('change');
                        }
                    });
                }
            });

            parroquiaDropdown.on('change', function() {
                const parroquiaId = $(this).val();
                sectorDropdown.prop('disabled', true).empty().append('<option value="">Cargando...</option>');

                if (parroquiaId) {
                    $.getJSON('/api/locations/parroquias/' + parroquiaId + '/sectores', function(data) {
                        populateDropdown(sectorDropdown, data, selectedSectorId);
                    });
                }
            });

            if (estadoDropdown.val()) {
                estadoDropdown.trigger('change');
            }
        });
    </script>
@endpush
</x-app-layout>