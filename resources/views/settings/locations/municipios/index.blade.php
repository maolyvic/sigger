<x-app-layout>
    @push('scripts')
        <!-- Estilos y Scripts de Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuración de Locaciones') }}
        </h2>
    </x-slot>

    {{-- He cambiado el 'active' para que coincida con el desplegable de locaciones, puedes ajustarlo --}}
    <x-settings-tabs active="locaciones" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Lista de Municipios</h3>
                        <a href="{{ route('settings.locations.municipios.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Crear Municipio
                        </a>
                    </div>

                    <div class="mb-4">
                        <label for="estado-filter" class="block text-sm font-medium text-gray-700">Filtrar por
                            Estado</label>
                        <select id="estado-filter"
                            class="mt-1 block w-full md:w-1/3 rounded-md border-gray-300 shadow-sm">
                            <option value="">Todos los Estados</option>
                            @isset($estados)
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->nombre }}">{{ $estado->nombre }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>


                    <table id="municipios-table" class="display min-w-full">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($municipios as $municipio)
                                <tr>
                                    <td>{{ $municipio->nombre }}</td>
                                    <td>{{ $municipio->estado?->nombre ?? 'Sin Estado Asignado' }}</td>
                                    <td>
                                        <div class="flex items-center space-x-4">
                                            <a href="{{ route('settings.locations.municipios.edit', $municipio->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            <form
                                                action="{{ route('settings.locations.municipios.destroy', $municipio->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro de que quieres eliminar este municipio?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                // Inicializa la tabla con Datatables
                var table = $('#municipios-table').DataTable({
                    language: { // Opcional: Traducción al español
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    }
                });

                // Lógica para el filtro personalizado
                $('#estado-filter').on('change', function() {
                    var selectedEstado = $(this).val();

                    // Usa la API de Datatables para buscar en la segunda columna (índice 1)
                    // y luego redibuja la tabla para mostrar el resultado.
                    // Si el valor es "", quita el filtro.
                    table.column(1).search(selectedEstado).draw();
                });
            });
        </script>
    @endpush
</x-app-layout>
