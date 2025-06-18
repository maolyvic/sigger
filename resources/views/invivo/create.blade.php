@extends('adminlte::page')

@section('title', 'Crear Ingreso')
@section('content_header')
<!--<h1>{{ __('Nuevo Registro de Ingreso') }}</h1>-->
@stop
@section('content')
<div>
    <div class="row">
        <div class="col-md-4">
            @if (session('message'))
            <x-adminlte-callout theme="success" class="bg-teal" icon="fas fa-lg fa-thumbs-up" title="Listo">
                <i class="text-dark">{{ session('message') }}</i>
            </x-adminlte-callout>
            @endif

            @if (session('success'))
            <x-adminlte-callout theme="success" class="bg-teal" icon="fas fa-lg fa-thumbs-up" title="Listo">
                <i class="text-dark">{{ session('success') }}</i>
            </x-adminlte-callout>
            @endif

            @if (session('error'))
            <x-adminlte-callout theme="danger" title-class="text-danger text-uppercase"
                icon="fas fa-lg fa-exclamation-circle" title="ERROR">
                <i>{{ session('error') }}</i>
            </x-adminlte-callout>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Crear Registro') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('invivo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="reconocimiento_medico">Reconocimiento medico</label>
                                    <input type="text" name="reconocimiento_medico" class="form-control" id="reconocimiento_medico">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="toxicologico">Toxicologico</label>
                                    <input type="text" name="toxicologico" class="form-control" id="toxicologico">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="diagnostico_mental">Diagnostico mental</label>
                                    <input type="text" name="diagnostico_mental" class="form-control" id="diagnostico_mental">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="odontologia">Odontología</label>
                                    <input type="text" name="odontologia" class="form-control" id="odontologia">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="antropologia">Antropología</label>
                                    <input type="text" name="antropologia" class="form-control" id="antropologia">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="radiologia_forense">Radiología forense</label>
                                    <input type="text" name="radiologia_forense" class="form-control" id="radiologia_forense">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="vagino_rectal">Vagino Rectal</label>
                                    <input type="text" name="vagino_rectal" class="form-control" id="vagino_rectal">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fijaciones_fotograficas">Fijaciones Fotográficas</label>
                                    <input type="text" name="fijaciones_fotograficas" class="form-control" id="fijaciones_fotograficas">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="huellas_mordeduras">Huellas Mordeduras</label>
                                    <input type="text" name="huellas_mordeduras" class="form-control" id="huellas_mordeduras">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="examen_histologico">Examen Histológico</label>
                                    <input type="text" name="examen_histologico" class="form-control" id="examen_histologico">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="examen_citologico">Examen Citológico</label>
                                    <input type="text" name="examen_citologico" class="form-control" id="examen_citologico">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Guardar</button>
                        <a href="{{ route('invivo.index') }}" class="btn btn-success float-right">Regresar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    function previewPDF(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function() {
            const pdfData = new Uint8Array(reader.result);
            const loadingTask = pdfjsLib.getDocument(pdfData);
            loadingTask.promise.then(function(pdf) {
                pdf.getPage(1).then(function(page) {
                    const scale = 1.5;
                    const viewport = page.getViewport({
                        scale: scale
                    });
                    const canvas = document.getElementById('pdfCanvas');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                    canvas.style.display = 'block';
                });
            });
        };
        reader.readAsArrayBuffer(file);
    }
</script>
@stop