<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editando Estado: {{ $estado->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('settings.locations.estados.update', $estado->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-6">
                            {{-- Nombre --}}
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Estado</label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $estado->nombre) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            {{-- Código --}}
                            <div>
                                <label for="codigo" class="block text-sm font-medium text-gray-700">Código (Opcional)</label>
                                <input type="text" name="codigo" id="codigo" value="{{ old('codigo', $estado->codigo) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            {{-- Redip (Dropdown) --}}
                            <div>
                                <label for="redip_id" class="block text-sm font-medium text-gray-700">Redip a la que Pertenece</label>
                                <select name="redip_id" id="redip_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    @foreach ($redips as $redip)
                                        <option value="{{ $redip->id }}" {{ old('redip_id', $estado->redip_id) == $redip->id ? 'selected' : '' }}>
                                            {{ $redip->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Botones --}}
                            <div class="flex justify-end space-x-4 pt-4">
                                <a href="{{ route('settings.locations.estados.index') }}" class="px-4 py-2 border rounded-md text-sm">Cancelar</a>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">Actualizar Estado</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>