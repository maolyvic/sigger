<x-app-layout>
    {{-- 1. Incluimos los assets de Datatables --}}
    @push('scripts')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Configuración de Locaciones</h2>
    </x-slot>
    <x-settings-tabs active="locaciones" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Bloque para mostrar mensajes de sesión --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                    <span>{{ session('success') }}</span>
                </div>
            @endif
             @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Lista de Parroquias</h3>
                        <a href="{{ route('settings.locations.parroquias.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-700">Crear Parroquia</a>
                    </div>

                    {{-- 2. La tabla HTML que será "mejorada" por Datatables --}}
                    <table id="parroquias-table" class="display min-w-full">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Municipio al que Pertenece</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Llenamos la tabla con los datos del controlador --}}
                            @foreach ($parroquias as $parroquia)
                            <tr>
                                <td>{{ $parroquia->nombre }}</td>
                                {{-- Usamos el operador null-safe por si alguna parroquia tiene un municipio_id inválido --}}
                                <td>{{ $parroquia->municipio?->nombre ?? 'N/A' }}</td>
                                <td>
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('settings.locations.parroquias.edit', $parroquia->id) }}" 
                                           class="text-indigo-600 hover:text-indigo-900">
                                           Editar
                                        </a>
                                        <form action="{{ route('settings.locations.parroquias.destroy', $parroquia->id) }}" method="POST" 
                                              onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta parroquia?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900">
                                                Borrar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. El script que inicializa Datatables --}}
    @push('scripts')
    <script>
        $(document).ready(function () {
            $('#parroquias-table').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                }
            });
        });
    </script>
    @endpush
</x-app-layout>