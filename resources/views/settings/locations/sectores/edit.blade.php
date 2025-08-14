<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editando Sector: {{ $sector->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{--
                        CORRECCIÓN APLICADA AQUÍ:
                        Pasamos el objeto del modelo completo '$sector' a la ruta.
                        Laravel extraerá automáticamente el ID para generar la URL correcta.
                    --}}
                    <form action="{{ route('settings.locations.sectores.update', $sector) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="space-y-6">
                            <!-- Campo: Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Sector</label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $sector->nombre) }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required autofocus>
                                @error('nombre')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Campo: Parroquia (Dropdown) -->
                            <div>
                                <label for="parroquia_id" class="block text-sm font-medium text-gray-700">Parroquia a la que Pertenece</label>
                                <select name="parroquia_id" id="parroquia_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">Seleccione una parroquia...</option>
                                    @foreach ($parroquias as $parroquia)
                                        <option value="{{ $parroquia->id }}" 
                                            {{ old('parroquia_id', $sector->parroquia_id) == $parroquia->id ? 'selected' : '' }}>
                                            {{ $parroquia->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parroquia_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Botones de Acción -->
                            <div class="flex justify-end space-x-4 pt-4">
                                <a href="{{ route('settings.locations.sectores.index') }}" 
                                   class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Cancelar
                                </a>
                                <button type="submit" 
                                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                    Actualizar Sector
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>