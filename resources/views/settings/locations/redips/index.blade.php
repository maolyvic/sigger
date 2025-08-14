<x-app-layout>
    @push('scripts')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Configuración de Locaciones
        </h2>
    </x-slot>
    <x-settings-tabs active="locaciones" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Mensajes de Sesión --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Lista de Redips (Regiones)</h3>
                        <a href="{{ route('settings.locations.redips.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-700">
                            Crear Redip
                        </a>
                    </div>

                    <table id="redips-table" class="display min-w-full">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Código</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($redips as $redip)
                            <tr>
                                <td>{{ $redip->nombre }}</td>
                                <td>{{ $redip->codigo }}</td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('settings.locations.redips.edit', $redip->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                        <form action="{{ route('settings.locations.redips.destroy', $redip->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Borrar</button>
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
        $(document).ready(function () {
            $('#redips-table').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                }
            });
        });
    </script>
    @endpush
</x-app-layout>