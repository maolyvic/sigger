<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalles de Evaluación In Vivo #{{ $invivo->id }}
            </h2>
            
            <div class="flex items-center space-x-2">
                <a href="{{ route('evaluaciones.invivo.index') }}" 
                   class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Volver al Listado
                </a>
                <a href="{{ route('evaluaciones.invivo.edit', $invivo) }}" 
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    Editar Evaluación
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    
                    <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">
                        Cantidad de Exámenes Realizados
                    </h3>

                    {{-- Usamos una lista de definición para mostrar los datos --}}
                    <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4">
                        
                        <div>
                            <dt class="font-semibold">Reconocimiento Médico:</dt>
                            <dd class="text-gray-700">{{ $invivo->reconocimiento_medico ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Toxicológico:</dt>
                            <dd class="text-gray-700">{{ $invivo->toxicologico ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Diagnóstico Mental:</dt>
                            <dd class="text-gray-700">{{ $invivo->diagnostico_mental ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Odontología:</dt>
                            <dd class="text-gray-700">{{ $invivo->odontologia ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Antropología:</dt>
                            <dd class="text-gray-700">{{ $invivo->antropologia ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Radiología Forense:</dt>
                            <dd class="text-gray-700">{{ $invivo->radiologia_forense ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Vagino-Rectal:</dt>
                            <dd class="text-gray-700">{{ $invivo->vagino_rectal ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Fijaciones Fotográficas:</dt>
                            <dd class="text-gray-700">{{ $invivo->fijaciones_fotograficas ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Huellas de Mordeduras:</dt>
                            <dd class="text-gray-700">{{ $invivo->huellas_mordeduras ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Examen Histológico:</dt>
                            <dd class="text-gray-700">{{ $invivo->examen_histologico ?? 0 }}</dd>
                        </div>

                        <div>
                            <dt class="font-semibold">Examen Citológico:</dt>
                            <dd class="text-gray-700">{{ $invivo->examen_citologico ?? 0 }}</dd>
                        </div>

                    </dl>
                    
                    <div class="border-t mt-6 pt-4">
                        <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-6">
                             <div>
                                <dt class="font-semibold">Fecha de Creación:</dt>
                                <dd class="text-gray-700">{{ $invivo->created_at->format('d/m/Y h:i A') }}</dd>
                            </div>
                             <div>
                                <dt class="font-semibold">Última Actualización:</dt>
                                <dd class="text-gray-700">{{ $invivo->updated_at->format('d/m/Y h:i A') }}</dd>
                            </div>
                        </dl>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>