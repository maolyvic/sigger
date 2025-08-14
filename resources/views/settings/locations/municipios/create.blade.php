<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Crear Nuevo Municipio') }}
        </h2>
    </x-slot>
    @error('estado_id')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
    <div class="py-12">
        {{-- Usamos max-w-4xl para que el formulario no sea tan ancho y se vea mejor --}}
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- El formulario apunta a la ruta 'store' para guardar los datos --}}
                    <form action="{{ route('settings.locations.municipios.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            
                            <!-- Campo: Nombre del Municipio -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Municipio</label>
                                <input type="text" name="nombre" id="nombre"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                       required autofocus>
                            </div>

                            <!-- Campo: Estado (Menú Desplegable) -->
                            <div>
                                <label for="estado_id" class="block text-sm font-medium text-gray-700">Estado al que pertenece</label>
                                <select name="estado_id" id="estado_id"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                        required>
                                    <option value="" disabled selected>Seleccione un estado...</option>
                                    {{-- Iteramos sobre la variable $estados que pasamos desde el controlador --}}
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="flex justify-end space-x-4 pt-4 p-4 ml-4">
                                <a href="{{ route('settings.locations.municipios.index') }}"
                                   class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Cancelar
                                </a>
                                <button type="submit"
                                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                    Guardar Municipio
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
