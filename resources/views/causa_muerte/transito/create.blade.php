<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Registrar Causa de Muerte por Tránsito</h2>
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

                    <form action="{{ route('causa_muerte.transito.store') }}" method="POST" x-data="{ sexo: '{{ old('sexo') }}' }">
                        @csrf
                        <input type="hidden" name="delito" value="TRÁNSITO">
                        <input type="hidden" name="grupo_etario" :value="grupoEtario">

                        <div class="space-y-10">

                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Generales de Ingreso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    {{-- Este campo ocupará todo el ancho --}}
                                    <div class="md:col-span-2">
                                        <label for="numero_entrada" class="block text-sm font-medium text-gray-700">Número de Entrada</label>
                                        <input type="text" name="numero_entrada" id="numero_entrada" value="{{ old('numero_entrada') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>

                                    {{-- Estos campos se alinearán en una fila de 2 --}}
                                    <div>
                                        <label for="numero_expediente" class="block text-sm font-medium text-gray-700">Número de Expediente</label>
                                        <input type="text" name="numero_expediente" id="numero_expediente" value="{{ old('numero_expediente') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div>
                                        <label for="despacho" class="block text-sm font-medium text-gray-700">Despacho</label>
                                        <select name="despacho" id="despacho" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['SENAMECF', 'CICPC', 'CPNB', 'GNB', 'OTROS'] as $option)
                                                <option value="{{ $option }}" {{ old('despacho') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="fecha_ingreso_cadaver" class="block text-sm font-medium text-gray-700">Fecha de Ingreso del Cadáver</label>
                                        <input type="date" name="fecha_ingreso_cadaver" id="fecha_ingreso_cadaver" value="{{ old('fecha_ingreso_cadaver', date('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="hora" class="block text-sm font-medium text-gray-700">Hora de Ingreso</label>
                                        <input type="time" name="hora" id="hora" value="{{ old('hora', date('H:i')) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Suceso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    <div>
                                        <label for="tipo_vehiculo" class="block text-sm font-medium text-gray-700">Tipo de Vehículo</label>
                                        <select name="tipo_vehiculo" id="tipo_vehiculo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['AUTOMÓVIL', 'MOTO', 'CAMIONETA', 'CAMIÓN', 'NO', 'POR DETERMINAR'] as $option)
                                                <option value="{{ $option }}" {{ old('tipo_vehiculo') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="fecha_suceso_transito" class="block text-sm font-medium text-gray-700">Fecha del Suceso</label>
                                        <input type="date" name="fecha_suceso_transito" id="fecha_suceso_transito" value="{{ old('fecha_suceso_transito') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div>
                                        <label for="causa_muerte" class="block text-sm font-medium text-gray-700">Causa de Muerte Presunta</label>
                                        <select name="causa_muerte" id="causa_muerte" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['HXAF', 'HXAB', 'A DETERMINAR', 'AHORCADO', 'POLITRAUMATISMO', 'NATURAL', 'AHOGADO', 'QUEMADO', 'ELECTROCUTADO', 'HIPOTERMÍA', 'ASFIXIA MÉCANICA', 'ESTRANGULAMIENTO', 'ENVENENAMIENTO'] as $option)
                                                <option value="{{ $option }}" {{ old('causa_muerte') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- CORREGIDO: Para ocupar el ancho completo, se usa col-span-2. --}}
                                    <div class="md:col-span-2">
                                        <label for="mecanismo_causa_muerte" class="block text-sm font-medium text-gray-700">Mecanismo de la Causa de Muerte</label>
                                        <select name="mecanismo_causa_muerte" id="mecanismo_causa_muerte" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['CAÍDA DE ALTURA', 'CAÍDA DE SUS PROPIOS PIES', 'OBJETO CONTUNDENTE', 'ARROLLAMIENTO DE METRO', 'LINCHAMIENTO', 'INHALACIÓN DE GASES', 'TRAUMA TÉRMICO', 'APLASTAMIENTO', 'TERREMOTO', 'ACCIDENTE AÉREO', 'INUNDACIÓN', 'RAYOS', 'INCENDIO', 'INTOXICACIÓN EXÓGENA', 'EXPLOSIÓN', 'ACCIDENTE DE TRÁNSITO', 'ABALANZAMIENTO', 'TAPIADO', 'SE DESCONOCE', 'ASFIXIA MÉCANICA', 'OTROS'] as $option)
                                                <option value="{{ $option }}" {{ old('mecanismo_causa_muerte') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </section>

                            <section id="location-wrapper">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos de Locación del Suceso</h3>

                                {{-- Aquí se usa un grid de 2 columnas, que funciona bien para 4 elementos --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    <div>
                                        <label for="estado_id" class="block text-sm font-medium text-gray-700">Estado</label>
                                        <select name="estado_id" id="estado_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                            <option value="">Seleccione un Estado...</option>
                                            @foreach ($estados as $estado)
                                                <option value="{{ $estado->id }}" {{ old('estado_id') == $estado->id ? 'selected' : '' }}>
                                                    {{ $estado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="municipio_id" class="block text-sm font-medium text-gray-700">Municipio</label>
                                        <select name="municipio_id" id="municipio_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm disabled:bg-gray-100" disabled required>
                                            <option value="">Seleccione primero un Estado...</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="parroquia_id" class="block text-sm font-medium text-gray-700">Parroquia</label>
                                        <select name="parroquia_id" id="parroquia_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm disabled:bg-gray-100" disabled required>
                                            <option value="">Seleccione primero un Municipio...</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="sector_id" class="block text-sm font-medium text-gray-700">Sector</label>
                                        <select name="sector_id" id="sector_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm disabled:bg-gray-100" disabled>
                                            <option value="">Seleccione primero una Parroquia...</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    <div>
                                        <label for="direccion_remocion_cadaver" class="block text-sm font-medium text-gray-700">Lugar de Remoción</label>
                                        <select name="direccion_remocion_cadaver" id="direccion_remocion_cadaver" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['AMBULATORIO', 'CDI', 'CENTRO PENITENCIARIO', 'CICPC', 'CLINICA', 'HOSPITAL', 'NO DECLARADO', 'OTROS', 'CPNB', 'GNB', 'VIA PUBLICA'] as $option)
                                                <option value="{{ $option }}" {{ old('direccion_remocion_cadaver') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="categorizacion_referencias" class="block text-sm font-medium text-gray-700">Categorización del Sitio</label>
                                        <select name="categorizacion_referencias" id="categorizacion_referencias" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['BARRIO O CASERÍO', 'CENTRO DE SALUD', 'CENTRO PENITENCIARIO', 'GRAN MISIÓN VIVIENDA VENEZUELA (GMVV)', 'HOTEL O POSADA', 'INSTALACIONES DEL ESTADO VENEZOLANO', 'INTERIOR DE VEHÍCULO', 'URBANIZACIÓN O CONJUNTO RESIDENCIAL', 'VÍA PÚBLICA', 'OTROS'] as $option)
                                                <option value="{{ $option }}" {{ old('categorizacion_referencias') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="direccion_exacta" class="block text-sm font-medium text-gray-700">Dirección Exacta</label>
                                        <input type="text" name="direccion_exacta" id="direccion_exacta" value="{{ old('direccion_exacta') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                </div>
                            </section>

                            <section x-data="datosOcciso()">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Occiso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    {{-- CORREGIDO: Para ocupar el ancho completo, se usa col-span-2. --}}
                                    <div class="md:col-span-2">
                                        <label for="nombres_apellidos" class="block text-sm font-medium text-gray-700">Nombres y Apellidos</label>
                                        <input type="text" name="nombres_apellidos" id="nombres_apellidos" value="{{ old('nombres_apellidos') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div>
                                        <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                                        <select name="sexo" id="sexo" x-model="sexo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                            @foreach (['MASCULINO', 'FEMENINO', 'POR DETERMINAR', 'SE DESCONOCE'] as $option)
                                                <option value="{{ $option }}" {{ old('sexo') == $option ? 'selected' : '' }}>{{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div x-show="sexo === 'FEMENINO'" style="display: none;">
                                        <label for="embarazada" class="block text-sm font-medium text-gray-700">¿Embarazada?</label>
                                        <select name="embarazada" id="embarazada" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            <option value="NO">NO</option>
                                            <option value="SI">SI</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="col-span-2">
                                                <input type="number" name="edad" id="edad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                            </div>
                                            <div>
                                                <select name="edad_medida" id="edad_medida" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                                    @foreach (['AÑO (S)', 'MES (ES)', 'DÍA (S)', 'MES (ES) DE GESTACIÓN', 'SE DESCONOCE'] as $option)
                                                        <option value="{{ $option }}">
                                                            {{ str_replace('_', ' ', $option) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- CORREGIDO: Se separaron los campos en sus propios divs --}}
                                    <div>
                                        <label for="nacionalidad" class="block text-sm font-medium text-gray-700">Nacionalidad</label>
                                        <select name="nacionalidad" id="nacionalidad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['VENEZOLANA', 'EXTRANJERA', 'POR DETERMINAR', 'SE DESCONOCE'] as $option)
                                                <option value="{{ $option }}" {{ old('nacionalidad') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="identificacion" class="block text-sm font-medium text-gray-700">N° de Identificación</label>
                                        <input type="text" name="identificacion" id="identificacion" value="{{ old('identificacion') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción de Vestimentas y Pertinencias</label>
                                        <textarea name="descripcion" id="descripcion" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion') }}</textarea>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Finales y Observaciones</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                    <div>
                                        <label for="fecha_dictamen_muerte" class="block text-sm font-medium text-gray-700">Fecha Dictamen de Muerte</label>
                                        <input type="date" name="fecha_dictamen_muerte" id="fecha_dictamen_muerte" value="{{ old('fecha_dictamen_muerte') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="hora_dictamen_muerte" class="block text-sm font-medium text-gray-700">Hora Dictamen de Muerte</label>
                                        <input type="time" name="hora_dictamen_muerte" id="hora_dictamen_muerte" value="{{ old('hora_dictamen_muerte') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <div>
                                        <label for="fases_descomposicion" class="block text-sm font-medium text-gray-700">Fase de Descomposición</label>
                                        <select name="fases_descomposicion" id="fases_descomposicion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            @foreach (['FRESCO', 'PUTREFACTO', 'OSAMENTO'] as $option)
                                                <option value="{{ $option }}" {{ old('fases_descomposicion') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- CORREGIDO: Para ocupar el ancho completo, se usa col-span-2. --}}
                                    <div class="md:col-span-2">
                                        <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                                        <textarea name="observaciones" id="observaciones" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('observaciones') }}</textarea>
                                    </div>
                                </div>
                            </section>

                            <div class="flex justify-end space-x-4 pt-4 border-t">
                                <a href="{{ route('causa_muerte.transito.index') }}" class="px-4 py-2 border rounded-md text-sm">Cancelar</a>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">Guardar Registro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        {{-- Tu script de Javascript permanece igual, ya que es funcional --}}
        <script>
            $(document).ready(function() {
                // ---- VARIABLES PARA GUARDAR LOS VALORES ANTIGUOS ----
                const oldMunicipioId = "{{ old('municipio_id') }}";
                const oldParroquiaId = "{{ old('parroquia_id') }}";
                const oldSectorId = "{{ old('sector_id') }}";

                // ---- REFERENCIAS A LOS DROPDOWNS ----
                const estadoDropdown = $('#estado_id');
                const municipioDropdown = $('#municipio_id');
                const parroquiaDropdown = $('#parroquia_id');
                const sectorDropdown = $('#sector_id');

                function populateDropdown(dropdown, data, selectedValue = null) {
                    dropdown.empty().append('<option value="">Seleccione...</option>');
                    $.each(data, function(key, value) {
                        dropdown.append($('<option></option>').attr('value', value.id).text(value.nombre));
                    });
                    if (selectedValue) {
                        dropdown.val(selectedValue);
                    }
                    dropdown.prop('disabled', false);
                }

                // ---- EVENTO: CUANDO SE CAMBIA EL ESTADO ----
                estadoDropdown.on('change', function() {
                    const estadoId = $(this).val();
                    municipioDropdown.prop('disabled', true).empty().append(
                        '<option value="">Cargando...</option>');
                    parroquiaDropdown.prop('disabled', true).empty().append(
                        '<option value="">Seleccione un Municipio...</option>');
                    sectorDropdown.prop('disabled', true).empty().append(
                        '<option value="">Seleccione una Parroquia...</option>');

                    if (estadoId) {
                        $.getJSON('/api/locations/estados/' + estadoId + '/municipios', function(data) {
                            populateDropdown(municipioDropdown, data, oldMunicipioId);
                            if (oldMunicipioId) {
                                municipioDropdown.trigger('change');
                            }
                        });
                    }
                });

                // ---- EVENTO: CUANDO SE CAMBIA EL MUNICIPIO ----
                municipioDropdown.on('change', function() {
                    const municipioId = $(this).val();
                    parroquiaDropdown.prop('disabled', true).empty().append(
                        '<option value="">Cargando...</option>');
                    sectorDropdown.prop('disabled', true).empty().append(
                        '<option value="">Seleccione una Parroquia...</option>');

                    if (municipioId) {
                        $.getJSON('/api/locations/municipios/' + municipioId + '/parroquias', function(data) {
                            populateDropdown(parroquiaDropdown, data, oldParroquiaId);
                            if (oldParroquiaId) {
                                parroquiaDropdown.trigger('change');
                            }
                        });
                    }
                });

                // ---- EVENTO: CUANDO SE CAMBIA LA PARROQUIA ----
                parroquiaDropdown.on('change', function() {
                    const parroquiaId = $(this).val();
                    sectorDropdown.prop('disabled', true).empty().append(
                        '<option value="">Cargando...</option>');

                    if (parroquiaId) {
                        $.getJSON('/api/locations/parroquias/' + parroquiaId + '/sectores', function(data) {
                            populateDropdown(sectorDropdown, data, oldSectorId);
                        });
                    }
                });

                // ---- EJECUCIÓN INICIAL ----
                if (estadoDropdown.val()) {
                    estadoDropdown.trigger('change');
                }
            });
        </script>
    @endpush
</x-app-layout>