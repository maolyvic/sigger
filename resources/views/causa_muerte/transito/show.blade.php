<x-app-layout>
    <x-slot name="header">
        {{-- Usamos flex y justify-between para separar el título de los botones --}}
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalles: N° Entrada {{ $transito->numero_entrada }}
            </h2>
            
            {{-- Grupo de botones de acción en la cabecera --}}
            <div class="flex space-x-2">
                <a href="{{ route('causa_muerte.transito.index') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Volver al Listado
                </a>
                <a href="{{ route('causa_muerte.transito.edit', $transito) }}" class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                <div class="font-semibold">Número de Entrada:</div><div class="md:col-span-2">{{ $transito->numero_entrada }}</div>
                                <div class="font-semibold">Número de Expediente:</div><div class="md:col-span-2">{{ $transito->numero_expediente ?? 'N/A' }}</div>
                                <div class="font-semibold">Despacho:</div><div class="md:col-span-2">{{ $transito->despacho }}</div>
                                <div class="font-semibold">Fecha de Ingreso:</div><div class="md:col-span-2">{{ \Carbon\Carbon::parse($transito->fecha_ingreso_cadaver)->format('d/m/Y') }}</div>
                                <div class="font-semibold">Hora de Ingreso:</div><div class="md:col-span-2">{{ \Carbon\Carbon::parse($transito->hora)->format('h:i A') }}</div>
                            </dl>
                        </section>

                        <section>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Suceso</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4">
                                <div class="font-semibold">Tipo de Vehículo:</div><div class="md:col-span-2">{{ $transito->tipo_vehiculo ?? 'N/A' }}</div>
                                <div class="font-semibold">Fecha del Suceso:</div><div class="md:col-span-2">{{ $transito->fecha_suceso_transito ? \Carbon\Carbon::parse($transito->fecha_suceso_transito)->format('d/m/Y') : 'N/A' }}</div>
                                <div class="font-semibold">Causa de Muerte Presunta:</div><div class="md:col-span-2">{{ $transito->causa_muerte ?? 'N/A' }}</div>
                                <div class="font-semibold">Mecanismo:</div><div class="md:col-span-2">{{ $transito->mecanismo_causa_muerte ?? 'N/A' }}</div>
                            </dl>
                        </section>

                        <section>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos de Locación del Suceso</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4">
                                <div class="font-semibold">Estado:</div><div class="md:col-span-2">{{ $transito->estado?->nombre ?? 'N/A' }}</div>
                                <div class="font-semibold">Municipio:</div><div class="md:col-span-2">{{ $transito->municipio?->nombre ?? 'N/A' }}</div>
                                <div class="font-semibold">Parroquia:</div><div class="md:col-span-2">{{ $transito->parroquia?->nombre ?? 'N/A' }}</div>
                                <div class="font-semibold">Sector:</div><div class="md:col-span-2">{{ $transito->sector?->nombre ?? 'N/A' }}</div>
                                <div class="font-semibold">Lugar de Remoción:</div><div class="md:col-span-2">{{ $transito->direccion_remocion_cadaver ?? 'N/A' }}</div>
                                <div class="font-semibold">Categorización del Sitio:</div><div class="md:col-span-2">{{ $transito->categorizacion_referencias ?? 'N/A' }}</div>
                                <div class="font-semibold">Dirección Exacta:</div><div class="md:col-span-2">{{ $transito->direccion_exacta }}</div>
                            </dl>
                        </section>

                        <section>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos del Occiso</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4">
                                <div class="font-semibold">Nombres y Apellidos:</div><div class="md:col-span-2">{{ $transito->nombres_apellidos ?? 'No identificado' }}</div>
                                <div class="font-semibold">Edad:</div><div class="md:col-span-2">{{ $transito->edad }} {{ $transito->edad_medida }}</div>
                                <div class="font-semibold">Grupo Etario:</div><div class="md:col-span-2">{{ $transito->grupo_etario }}</div>
                                <div class="font-semibold">Sexo:</div><div class="md:col-span-2">{{ $transito->sexo }}</div>
                                @if($transito->sexo === 'FEMENINO')
                                    <div class="font-semibold">Embarazada:</div><div class="md:col-span-2">{{ $transito->embarazada ?? 'N/A' }}</div>
                                @endif
                                <div class="font-semibold">Nacionalidad:</div><div class="md:col-span-2">{{ $transito->nacionalidad ?? 'N/A' }}</div>
                                <div class="font-semibold">Identificación:</div><div class="md:col-span-2">{{ $transito->tipo_identificacion ?? 'N/A' }} - {{ $transito->identificacion ?? 'N/A' }}</div>
                                <div class="font-semibold">Nivel de Instrucción:</div><div class="md:col-span-2">{{ $transito->nivel_instruccion ?? 'N/A' }}</div>
                                <div class="font-semibold">Sitio Donde Laboraba:</div><div class="md:col-span-2">{{ $transito->sitio_donde_laboraba ?? 'N/A' }}</div>
                                <div class="font-semibold md:col-span-3 pt-2">Descripción de Vestimentas:</div>
                                <div class="md:col-span-3 text-gray-700 text-sm">{{ $transito->descripcion ?? 'Sin descripción.' }}</div>
                            </dl>
                        </section>

                        <section>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Datos Finales y Observaciones</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4">
                                <div class="font-semibold">Fecha Dictamen de Muerte:</div><div class="md:col-span-2">{{ \Carbon\Carbon::parse($transito->fecha_dictamen_muerte)->format('d/m/Y') }}</div>
                                <div class="font-semibold">Hora Dictamen de Muerte:</div><div class="md:col-span-2">{{ \Carbon\Carbon::parse($transito->hora_dictamen_muerte)->format('h:i A') }}</div>
                                <div class="font-semibold">Fase de Descomposición:</div><div class="md:col-span-2">{{ $transito->fases_descomposicion ?? 'N/A' }}</div>
                                <div class="font-semibold md:col-span-3 pt-2">Observaciones:</div>
                                <div class="md:col-span-3 text-gray-700 text-sm">{{ $transito->observaciones ?? 'Sin observaciones.' }}</div>
                            </dl>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>