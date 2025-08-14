<x-app-layout>
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
            {{-- ... mensajes de sesión ... --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Lista de Sectores</h3>
                        <a href="{{ route('settings.locations.sectores.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-700">Crear
                            Sector</a>
                    </div>

                    <div id="loading-indicator" class="flex justify-center items-center p-6">
                        <div class="flex items-center space-x-2 text-gray-500">
                            <!-- Spinner de Tailwind CSS -->
                            <svg class="animate-spin h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span>Cargando datos...</span>
                        </div>
                    </div>
                    <div id="datatable-container" class="datatable-loading">
                        <table id="sectores-table" class="display min-w-full">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Parroquia a la que Pertenece</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sectores as $sector)
                                    <tr>
                                        <td>{{ $sector->nombre }}</td>
                                        <td>{{ $sector->parroquia?->nombre ?? 'N/A' }}</td>
                                        <td>
                                            <div class="flex items-center space-x-8 ">
                                                <a href="{{ route('settings.locations.sectores.edit', $sector->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                                <form
                                                    action="{{ route('settings.locations.sectores.destroy', $sector->id) }}"
                                                    method="POST" onsubmit="return confirm('¿Estás seguro?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-900">Borrar</button>
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
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // OCULTAMOS EL FUTURO CONTENEDOR DE DATATABLES
                // Esto oculta la tabla "cruda" y el "Processing..." que a veces parpadea
                $('#sectores-table_wrapper').hide();

                $('#sectores-table').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    },
                    // La función de callback que se ejecuta cuando la tabla está lista
                    initComplete: function(settings, json) {
                        // Ocultamos el indicador de carga que creamos
                        $('#loading-indicator').hide();

                        // Mostramos el contenedor de Datatables, ahora completamente procesado
                        $('#sectores-table_wrapper').fadeIn(400); // Usamos fadeIn para una transición suave
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
