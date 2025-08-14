<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Hacemos el título dinámico para saber qué estamos editando --}}
            Editando Redip: {{ $redip->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- El formulario apunta a la ruta de actualización y pasa el ID de la redip --}}
                    <form action="{{ route('settings.locations.redips.update', $redip->id) }}" method="POST">
                        @csrf
                        @method('PATCH') {{-- O 'PUT'. Le dice a Laravel que es una petición de actualización. --}}
                        
                        <div class="space-y-6">
                            <!-- Campo: Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la Redip (Ej: Capital)</label>
                                {{-- El helper old() muestra primero el dato de una validación fallida, si no, muestra el dato original de la BD --}}
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $redip->nombre) }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required autofocus>
                                @error('nombre') 
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Campo: Código -->
                            <div>
                                <label for="codigo" class="block text-sm font-medium text-gray-700">Código (Opcional)</label>
                                <input type="text" name="codigo" id="codigo" value="{{ old('codigo', $redip->codigo) }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('codigo') 
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Campo: Descripción -->
                            <div>
                                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción (Opcional)</label>
                                <textarea name="descripcion" id="descripcion" rows="3" 
                                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion', $redip->descripcion) }}</textarea>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="flex justify-end space-x-4 pt-4">
                                <a href="{{ route('settings.locations.redips.index') }}" 
                                   class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Cancelar
                                </a>
                                <button type="submit" 
                                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                    Actualizar Redip
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>