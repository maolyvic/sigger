@php
    $heads = [
        'ID', 
        'Reconocimiento Médico', 
        'Toxicológico', 
        'Diagnóstico Mental', 
        'Odontología', 
        'Antropología', 
        'Radiología Forense', 
        'Vagino Rectal', 
        'Fijaciones Fotográficas', 
        'Huellas Mordeduras', 
        'Examen Histológico', 
        'Examen Citológico', 
        'Acciones'
    ];

    $btnEdit = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Editar">
    <i class="fa fa-lg fa-fw fa-pen"></i>
</button>';
    $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
    <i class="fa fa-lg fa-fw fa-trash-alt"></i>
</button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver Detalle">
    <i class="fa fa-lg fa-fw fa-eye"></i>
</button>';

    $config = [
        'order' => [[0, 'asc']],
        'columns' => [null, null, null, null, null, null, null, null, null, null, null, null, null],
        'language' => [
            'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
        ],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Ingresos')

@section('content_header')
    <h1>{{ __('Datos de Ingresos') }}</h1>
@stop

@section('content')
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Datos de Ingresos') }}
                        </h2>
                        <a href="{{ route('invivo.create') }}" class="btn bg-success float-right"><i class="fas fa-plus"></i>
                            Nuevo</a>
                    </div>
                    <div class="card-body">
                        <x-adminlte-datatable id="table-personas" :heads="$heads" :config="$config" striped hoverable without-buttons>
                            @if (count($invivos) > 0)
                                @foreach ($invivos as $invivo)
                                    <tr>
                                        <td>{{ $invivo->id }}</td>
                                        <td>{{ $invivo->reconocimiento_medico }}</td>
                                        <td>{{ $invivo->toxicologico }}</td>
                                        <td>{{ $invivo->diagnostico_mental }}</td>
                                        <td>{{ $invivo->odontologia }}</td>
                                        <td>{{ $invivo->antropologia }}</td>
                                        <td>{{ $invivo->radiologia_forense }}</td>
                                        <td>{{ $invivo->vagino_rectal }}</td>
                                        <td>{{ $invivo->fijaciones_fotograficas }}</td>
                                        <td>{{ $invivo->huellas_mordeduras }}</td>
                                        <td>{{ $invivo->examen_histologico }}</td>
                                        <td>{{ $invivo->examen_citologico }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="formVer" style="display: inline-block; margin-right: 5px;" href="{{ route('invivo.show', $invivo->id) }}">
                                                    {!! $btnDetails !!}
                                                </a>
                                                <form class="formEliminar" style="display: inline;" action="{{ route('invivo.destroy', $invivo->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    {!! $btnDelete !!}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="13" class="text-center">No se encontraron ingresos</td>
                                </tr>
                            @endif
                        </x-adminlte-datatable>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
