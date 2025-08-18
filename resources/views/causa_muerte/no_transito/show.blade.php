<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalles del Registro: N° Entrada {{ $no_transito->numero_entrada }}
            </h2>

            <div class="flex items-center space-x-2">
                <a href="{{ route('causa_muerte.no_transito.index') }}"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Volver al Listado
                </a>
                <a href="{{ route('causa_muerte.no_transito.edit', $no_transito) }}"
                    class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Editar Registro
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    <div class="space-y-10">

                        <section>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Generales de Ingreso</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4">
                                <div>
                                    <dt class="font-semibold">Número de Entrada:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->numero_entrada }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Número de Expediente:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->numero_expediente ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Despacho:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->despacho }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Fecha de Ingreso:</dt>
                                    <dd class="text-gray-700">{{ \Carbon\Carbon::parse($no_transito->fecha_ingreso_cadaver)->format('d/m/Y') }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Hora de Ingreso:</dt>
                                    <dd class="text-gray-700">{{ \Carbon\Carbon::parse($no_transito->hora)->format('h:i A') }}</dd>
                                </div>
                            </dl>
                        </section>

                        <section>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Suceso</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4">
                                <div>
                                    <dt class="font-semibold">Delito:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->delito }}</dd>
                                </div>
                                <div class="md:col-span-2">
                                    <dt class="font-semibold">Causa de Muerte Presunta:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->causa_muerte ?? 'N/A' }}</dd>
                                </div>
                                <div class="md:col-span-3">
                                    <dt class="font-semibold">Mecanismo:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->mecanismo_causa_muerte ?? 'N/A' }}</dd>
                                </div>
                            </dl>
                        </section>

                        <section>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos de Locación del Suceso</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-4 gap-x-6 gap-y-4">
                                <div>
                                    <dt class="font-semibold">Estado:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->estado?->nombre ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Municipio:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->municipio?->nombre ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Parroquia:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->parroquia?->nombre ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Sector:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->sector?->nombre ?? 'N/A' }}</dd>
                                </div>
                            </dl>
                            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mt-4">
                                <div>
                                    <dt class="font-semibold">Lugar de Remoción:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->direccion_remocion_cadaver ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Categorización del Sitio:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->categorizacion_referencias ?? 'N/A' }}</dd>
                                </div>
                                <div class="md:col-span-2">
                                    <dt class="font-semibold">Dirección Exacta:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->direccion_exacta }}</dd>
                                </div>
                            </dl>
                        </section>

                        <section>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Occiso</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4">
                                <div class="md:col-span-3">
                                    <dt class="font-semibold">Nombres y Apellidos:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->nombres_apellidos ?? 'No identificado' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Edad:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->edad }} {{ $no_transito->edad_medida }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Grupo Etario:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->grupo_etario }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Sexo:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->sexo }}</dd>
                                </div>
                                @if($no_transito->sexo === 'FEMENINO')
                                <div>
                                    <dt class="font-semibold">Embarazada:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->embarazada ?? 'N/A' }}</dd>
                                </div>
                                @endif
                                <div>
                                    <dt class="font-semibold">Nacionalidad:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->nacionalidad ?? 'N/A' }}</dd>
                                </div>
                                <div class="md:col-span-2">
                                    <dt class="font-semibold">Identificación:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->tipo_identificacion ?? 'N/A' }} - {{ $no_transito->identificacion ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Nivel de Instrucción:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->nivel_instruccion ?? 'N/A' }}</dd>
                                </div>
                                <div class="md:col-span-2">
                                    <dt class="font-semibold">Sitio Donde Laboraba:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->sitio_donde_laboraba ?? 'N/A' }}</dd>
                                </div>
                                <div class="md:col-span-3">
                                    <dt class="font-semibold pt-2">Descripción de Vestimentas y Pertinencias:</dt>
                                    <dd class="text-gray-700 text-sm mt-1">{{ $no_transito->descripcion ?? 'Sin descripción.' }}</dd>
                                </div>
                            </dl>
                        </section>

                        <section>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Finales y Observaciones</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4">
                                <div>
                                    <dt class="font-semibold">Fecha Dictamen de Muerte:</dt>
                                    <dd class="text-gray-700">{{ \Carbon\Carbon::parse($no_transito->fecha_dictamen_muerte)->format('d/m/Y') }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Hora Dictamen de Muerte:</dt>
                                    <dd class="text-gray-700">{{ \Carbon\Carbon::parse($no_transito->hora_dictamen_muerte)->format('h:i A') }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold">Fase de Descomposición:</dt>
                                    <dd class="text-gray-700">{{ $no_transito->fases_descomposicion ?? 'N/A' }}</dd>
                                </div>
                                <div class="md:col-span-3">
                                    <dt class="font-semibold pt-2">Observaciones:</dt>
                                    <dd class="text-gray-700 text-sm mt-1">{{ $no_transito->observaciones ?? 'Sin observaciones.' }}</dd>
                                </div>
                            </dl>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>