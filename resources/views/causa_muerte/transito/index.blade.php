<x-app-layout>
    @push('scripts')
        {{-- Assets de Datatables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Causa de Muerte por Tránsito</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
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
                        <h3 class="text-lg font-medium text-gray-900">Lista de Registros por Tránsito</h3>
                        <a href="{{ route('causa_muerte.transito.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-700">
                            Crear Registro
                        </a>
                    </div>

                    {{-- La tabla tiene el tbody vacío, se llenará con Ajax --}}
                    <table id="transito-table" class="display min-w-full">
                        <thead>
                            <tr>
                                <th>N° Entrada</th>
                                <th>Nombre del Occiso</th>
                                <th>Fecha del Suceso</th>
                                <th>Tipo de Vehículo</th>
                                <th>Grupo Etario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Datatables llenará este contenido --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#transito-table').DataTable({
                // Activar modo Server-Side
                processing: true,
                serverSide: true,

                // Apuntar a la ruta de datos
                ajax: "{{ route('causa_muerte.transito.data') }}",

                // Definir las columnas
                columns: [
                    { data: 'numero_entrada', name: 'numero_entrada' },
                    { data: 'nombres_apellidos', name: 'nombres_apellidos' },
                    { data: 'fecha_suceso_transito', name: 'fecha_suceso_transito' },
                    { data: 'tipo_vehiculo', name: 'tipo_vehiculo' },
                    { data: 'grupo_etario', name: 'grupo_etario' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                }
            });
        });
    </script>
    @endpush
</x-app-layout>