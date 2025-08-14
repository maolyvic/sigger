<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Nuevo Estado
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('settings.locations.estados.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            {{-- Nombre --}}
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Estado</label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required autofocus>
                                @error('nombre') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            {{-- Código --}}
                            <div>
                                <label for="codigo" class="block text-sm font-medium text-gray-700">Código (Opcional)</label>
                                <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @error('codigo') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            {{-- Redip (Dropdown) --}}
                            <div>
                                <label for="redip_id" class="block text-sm font-medium text-gray-700">Redip a la que Pertenece</label>
                                <select name="redip_id" id="redip_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">Seleccione una Redip...</option>
                                    @foreach ($redips as $redip)
                                        <option value="{{ $redip->id }}" {{ old('redip_id') == $redip->id ? 'selected' : '' }}>{{ $redip->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('redip_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            {{-- Botones --}}
                            <div class="flex justify-end space-x-4 pt-4">
                                <a href="{{ route('settings.locations.estados.index') }}" class="px-4 py-2 border rounded-md text-sm">Cancelar</a>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">Guardar Estado</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>