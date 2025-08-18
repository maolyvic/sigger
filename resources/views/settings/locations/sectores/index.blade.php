<x-app-layout>
    @push('scripts')
        {{-- Assets de Datatables --}}
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
                        <a href="{{ route('settings.locations.sectores.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-700">Crear Sector</a>
                    </div>

                    {{-- La tabla ahora tiene el tbody vacío. El @foreach se ha ido. --}}
                    <table id="sectores-table" class="display min-w-full">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Parroquia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Datatables llenará este contenido vía AJAX --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Inicializa Datatables en modo server-side
            $('#sectores-table').DataTable({
                // Activa los indicadores "Procesando..."
                processing: true,
                // Activa el modo de procesamiento del lado del servidor
                serverSide: true,

                // Apunta a la ruta que creamos para obtener los datos JSON
                ajax: "{{ route('settings.locations.sectores.data') }}",

                // Define las columnas que la vista espera recibir del servidor
                columns: [
                    { data: 'nombre', name: 'nombre' },
                    // 'name' es crucial para que la ordenación funcione en la columna de la relación
                    { data: 'parroquia', name: 'parroquia.nombre' },
                    // La columna 'action' no se puede ordenar ni buscar
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                
                // Opcional: Traducción al español
                language: {
                    url: "{{ asset('vendor/datatables/es-ES.json') }}",
                }
            });
        });
    </script>
    @endpush
</x-app-layout>