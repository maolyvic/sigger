<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Usamos el nombre del municipio en el título para más claridad --}}
            Editando Municipio: {{ $municipio->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- El formulario apunta a la ruta 'update' y necesita el ID del municipio --}}
                    <form action="{{ route('settings.locations.municipios.update', $municipio->id) }}" method="POST">
                        @csrf
                        @method('PATCH') {{-- O 'PUT'. Le dice a Laravel que es una actualización. --}}

                        <div class="space-y-6">
                            
                            <!-- Campo: Nombre del Municipio -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Municipio</label>
                                <input type="text" name="nombre" id="nombre"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                       {{-- El helper old() muestra primero el dato de una validación fallida, si no, el dato actual --}}
                                       value="{{ old('nombre', $municipio->nombre) }}" 
                                       required>
                            </div>

                            <!-- Campo: Estado (Menú Desplegable) -->
                            <div>
                                <label for="estado_id" class="block text-sm font-medium text-gray-700">Estado al que pertenece</label>
                                <select name="estado_id" id="estado_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">Seleccione un estado...</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}" 
                                            {{-- Esta lógica selecciona el estado actual del municipio en el dropdown --}}
                                            {{ old('estado_id', $municipio->estados_id) == $estado->id ? 'selected' : '' }}>
                                            {{ $estado->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="flex justify-end space-x-4 pt-4">
                                <a href="{{ route('settings.locations.municipios.index') }}" class="px-4 py-2 border rounded-md text-sm">Cancelar</a>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">Actualizar Municipio</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>