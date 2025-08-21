php
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editando Evaluación In Vivo #{{ $invivo->id }}</h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <strong class="font-bold">¡Error!</strong> Revisa los datos del formulario.
                        </div>
                    @endif

                    <form action="{{ route('evaluaciones.invivo.update', $invivo) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-6">
                            Cantidad de Exámenes Realizados
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <div>
                                <label for="reconocimiento_medico" class="block text-sm font-medium text-gray-700">Reconocimiento Médico</label>
                                <input type="number" name="reconocimiento_medico" id="reconocimiento_medico" value="{{ old('reconocimiento_medico', $invivo->reconocimiento_medico) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="toxicologico" class="block text-sm font-medium text-gray-700">Toxicológico</label>
                                <input type="number" name="toxicologico" id="toxicologico" value="{{ old('toxicologico', $invivo->toxicologico) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="diagnostico_mental" class="block text-sm font-medium text-gray-700">Diagnóstico Mental</label>
                                <input type="number" name="diagnostico_mental" id="diagnostico_mental" value="{{ old('diagnostico_mental', $invivo->diagnostico_mental) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="odontologia" class="block text-sm font-medium text-gray-700">Odontología</label>
                                <input type="number" name="odontologia" id="odontologia" value="{{ old('odontologia', $invivo->odontologia) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="antropologia" class="block text-sm font-medium text-gray-700">Antropología</label>
                                <input type="number" name="antropologia" id="antropologia" value="{{ old('antropologia', $invivo->antropologia) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="radiologia_forense" class="block text-sm font-medium text-gray-700">Radiología Forense</label>
                                <input type="number" name="radiologia_forense" id="radiologia_forense" value="{{ old('radiologia_forense', $invivo->radiologia_forense) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="vagino_rectal" class="block text-sm font-medium text-gray-700">Vagino-Rectal</label>
                                <input type="number" name="vagino_rectal" id="vagino_rectal" value="{{ old('vagino_rectal', $invivo->vagino_rectal) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="fijaciones_fotograficas" class="block text-sm font-medium text-gray-700">Fijaciones Fotográficas</label>
                                <input type="number" name="fijaciones_fotograficas" id="fijaciones_fotograficas" value="{{ old('fijaciones_fotograficas', $invivo->fijaciones_fotograficas) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="huellas_mordeduras" class="block text-sm font-medium text-gray-700">Huellas de Mordeduras</label>
                                <input type="number" name="huellas_mordeduras" id="huellas_mordeduras" value="{{ old('huellas_mordeduras', $invivo->huellas_mordeduras) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="examen_histologico" class="block text-sm font-medium text-gray-700">Examen Histológico</label>
                                <input type="number" name="examen_histologico" id="examen_histologico" value="{{ old('examen_histologico', $invivo->examen_histologico) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div>
                                <label for="examen_citologico" class="block text-sm font-medium text-gray-700">Examen Citológico</label>
                                <input type="number" name="examen_citologico" id="examen_citologico" value="{{ old('examen_citologico', $invivo->examen_citologico) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                        </div>

                        <div class="flex justify-end space-x-4 pt-8 border-t mt-8">
                            <a href="{{ route('evaluaciones.invivo.index') }}" 
                               class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                Actualizar Evaluación
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>