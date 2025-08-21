<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Evaluación In Vivo</h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <strong class="font-bold">¡Error de validación!</strong> Revisa los campos marcados en rojo.
                        </div>
                    @endif

                    <form action="{{ route('evaluaciones.invivo.store') }}" method="POST">
                        @csrf
                        
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-6">
                            Cantidad de Exámenes Realizados
                        </h3>
                        
                        <div class="grid grid-cols-1 gap-y-6">
                            
                            <div>
                                <label for="reconocimiento_medico" class="block text-sm font-medium text-gray-700">Reconocimiento Médico</label>
                                <input type="number" name="reconocimiento_medico" id="reconocimiento_medico" value="{{ old('reconocimiento_medico', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('reconocimiento_medico') border-red-500 @enderror">
                                @error('reconocimiento_medico')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="toxicologico" class="block text-sm font-medium text-gray-700">Toxicológico</label>
                                <input type="number" name="toxicologico" id="toxicologico" value="{{ old('toxicologico', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('toxicologico') border-red-500 @enderror">
                                @error('toxicologico')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="diagnostico_mental" class="block text-sm font-medium text-gray-700">Diagnóstico Mental</label>
                                <input type="number" name="diagnostico_mental" id="diagnostico_mental" value="{{ old('diagnostico_mental', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('diagnostico_mental') border-red-500 @enderror">
                                @error('diagnostico_mental')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Y así para cada uno de los campos... --}}

                            <div>
                                <label for="odontologia" class="block text-sm font-medium text-gray-700">Odontología</label>
                                <input type="number" name="odontologia" id="odontologia" value="{{ old('odontologia', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('odontologia') border-red-500 @enderror">
                                @error('odontologia')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="antropologia" class="block text-sm font-medium text-gray-700">Antropología</label>
                                <input type="number" name="antropologia" id="antropologia" value="{{ old('antropologia', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('antropologia') border-red-500 @enderror">
                                @error('antropologia')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="radiologia_forense" class="block text-sm font-medium text-gray-700">Radiología Forense</label>
                                <input type="number" name="radiologia_forense" id="radiologia_forense" value="{{ old('radiologia_forense', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('radiologia_forense') border-red-500 @enderror">
                                @error('radiologia_forense')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="vagino_rectal" class="block text-sm font-medium text-gray-700">Vagino-Rectal</label>
                                <input type="number" name="vagino_rectal" id="vagino_rectal" value="{{ old('vagino_rectal', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('vagino_rectal') border-red-500 @enderror">
                                @error('vagino_rectal')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="fijaciones_fotograficas" class="block text-sm font-medium text-gray-700">Fijaciones Fotográficas</label>
                                <input type="number" name="fijaciones_fotograficas" id="fijaciones_fotograficas" value="{{ old('fijaciones_fotograficas', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('fijaciones_fotograficas') border-red-500 @enderror">
                                @error('fijaciones_fotograficas')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="huellas_mordeduras" class="block text-sm font-medium text-gray-700">Huellas de Mordeduras</label>
                                <input type="number" name="huellas_mordeduras" id="huellas_mordeduras" value="{{ old('huellas_mordeduras', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('huellas_mordeduras') border-red-500 @enderror">
                                @error('huellas_mordeduras')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="examen_histologico" class="block text-sm font-medium text-gray-700">Examen Histológico</label>
                                <input type="number" name="examen_histologico" id="examen_histologico" value="{{ old('examen_histologico', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('examen_histologico') border-red-500 @enderror">
                                @error('examen_histologico')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="examen_citologico" class="block text-sm font-medium text-gray-700">Examen Citológico</label>
                                <input type="number" name="examen_citologico" id="examen_citologico" value="{{ old('examen_citologico', 0) }}" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('examen_citologico') border-red-500 @enderror">
                                @error('examen_citologico')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="flex justify-end space-x-4 pt-8 border-t mt-8">
                            <a href="{{ route('evaluaciones.invivo.index') }}" 
                               class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                Guardar Evaluación
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>