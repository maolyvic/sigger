<x-app-layout>
    @push('scripts')
        {{-- Assets de Datatables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Evaluaciones In Vivo</h2>
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
                        <h3 class="text-lg font-medium text-gray-900">Listado de Evaluaciones</h3>
                        <a href="{{ route('evaluaciones.invivo.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-700">
                            Crear Evaluación
                        </a>
                    </div>

                    {{-- La tabla tiene el tbody vacío, se llenará con Ajax --}}
                    <table id="invivo-table" class="display min-w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Recon. Médico</th>
                                <th>Toxicológico</th>
                                <th>Diag. Mental</th>
                                <th>Fecha Creación</th>
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
            $('#invivo-table').DataTable({
                // Activar modo Server-Side
                processing: true,
                serverSide: true,

                // Apuntar a la ruta de datos que creamos
                ajax: "{{ route('evaluaciones.invivo.data') }}",

                // Definir las columnas que esperamos del servidor
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'reconocimiento_medico', name: 'reconocimiento_medico' },
                    { data: 'toxicologico', name: 'toxicologico' },
                    { data: 'diagnostico_mental', name: 'diagnostico_mental' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                
                language: {
                    url: "{{ asset('vendor/datatables/es-ES.json') }}",
                }
            });
        });
    </script>
    @endpush
</x-app-layout>