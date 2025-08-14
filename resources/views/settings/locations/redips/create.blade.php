<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Nueva Redip
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('settings.locations.redips.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            {{-- Nombre --}}
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la Redip (Ej: Capital)</label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required autofocus>
                                @error('nombre') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            {{-- Código --}}
                            <div>
                                <label for="codigo" class="block text-sm font-medium text-gray-700">Código (Opcional)</label>
                                <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('codigo') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            {{-- Descripción --}}
                            <div>
                                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción (Opcional)</label>
                                <textarea name="descripcion" id="descripcion" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion') }}</textarea>
                            </div>
                            {{-- Botones --}}
                            <div class="flex justify-end space-x-4 pt-4">
                                <a href="{{ route('settings.locations.redips.index') }}" class="px-4 py-2 border rounded-md text-sm">Cancelar</a>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">Guardar Redip</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>