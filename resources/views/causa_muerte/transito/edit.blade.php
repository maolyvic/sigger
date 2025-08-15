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

                    <form action="{{ route('causa_muerte.transito.update', $transito->id) }}" method="POST" x-data="{ sexo: '{{ old('sexo', $transito->sexo) }}' }">
                        @csrf
                        @method('PATCH') {{-- O 'PUT'. Le dice a Laravel que es una actualización. --}}
                        <input type="hidden" name="delito" value="TRÁNSITO">

                        <div class="space-y-10">
                            
                            {{-- SECCIÓN: DATOS GENERALES --}}
                            <section>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Generales de Ingreso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="numero_entrada" class="block text-sm font-medium text-gray-700">Número de Entrada</label>
                                        <input type="text" name="numero_entrada" id="numero_entrada" value="{{ old('numero_entrada', $transito->numero_entrada) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    {{-- ... y así para cada campo, usando old('campo', $transito->campo) ... --}}
                                </div>
                            </section>

                            {{-- SECCIÓN: DATOS DEL SUCESO --}}
                            <section>
                                {{-- ... campos de esta sección ... --}}
                            </section>

                            {{-- SECCIÓN: DATOS DE LOCACIÓN --}}
                            <section id="location-wrapper">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos de Locación del Suceso</h3>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                    <div>
                                        <label for="estado_id" class="block text-sm font-medium text-gray-700">Estado</label>
                                        <select name="estado_id" id="estado_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                            <option value="">Seleccione...</option>
                                            @foreach ($estados as $estado)
                                                <option value="{{ $estado->id }}" {{ old('estado_id', $transito->estado_id) == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- El resto de los dropdowns se llenarán y seleccionarán con JS --}}
                                    <div>
                                        <label for="municipio_id" class="block text-sm font-medium text-gray-700">Municipio</label>
                                        <select name="municipio_id" id="municipio_id" class="mt-1 block w-full" disabled required></select>
                                    </div>
                                    <div>
                                        <label for="parroquia_id" class="block text-sm font-medium text-gray-700">Parroquia</label>
                                        <select name="parroquia_id" id="parroquia_id" class="mt-1 block w-full" disabled required></select>
                                    </div>
                                    <div>
                                        <label for="sector_id" class="block text-sm font-medium text-gray-700">Sector</label>
                                        <select name="sector_id" id="sector_id" class="mt-1 block w-full" disabled></select>
                                    </div>
                                </div>
                                {{-- ... resto de la sección de locación ... --}}
                            </section>

                            {{-- SECCIÓN: DATOS DEL OCCISO --}}
                            <section>
                                {{-- ... campos de esta sección, usando old('campo', $transito->campo) ... --}}
                            </section>

                            {{-- ... --}}

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
        {{-- Aquí necesitas el mismo script de jQuery para los dropdowns anidados,
             pero con los valores 'old' correctos para la edición --}}
        <script>
            // Pasamos los IDs guardados a variables de JS
            const oldMunicipioId = "{{ old('municipio_id', $transito->municipio_id) }}";
            const oldParroquiaId = "{{ old('parroquia_id', $transito->parroquia_id) }}";
            const oldSectorId = "{{ old('sector_id', $transito->sector_id) }}";
            
            // ... El resto del script de jQuery para los dropdowns es el mismo ...
        </script>
    @endpush
</x-app-layout>