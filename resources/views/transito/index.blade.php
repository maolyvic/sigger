@php
    $heads = [
        'Número de Entrada',
        'Despacho',
        'Número de Expediente',
        'Delito',
        'Causa de Muerte',
        'Tipo de Vehículo',
        'Fecha Suceso Tránsito',
        'Fecha Ingreso Cadáver',
        'Hora',
        'Dirección Exacta',
        'Identificación',
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
        'columns' => [ null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null],
        'language' => [
            'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
        ],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Tránsito')

@section('content_header')
    <h1>{{ __('Datos de Tránsito') }}</h1>
@stop

@section('content')
    <div class="main">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('transito.create') }}" class="btn bg-success float-right"><i class="fas fa-plus"></i>
                            Nuevo</a>
                    </div>
                    <div class="card-body">
                        <x-adminlte-datatable id="table-transito" :heads="$heads" :config="$config" striped hoverable without-buttons>
                            @if (count($transito) > 0)
                                @foreach ($transito as $item)
                                    <tr>
                                        <td>{{ $item->numero_entrada }}</td>
                                        <td>{{ $item->despacho }}</td>
                                        <td>{{ $item->numero_expediente }}</td>
                                        <td>{{ $item->delito }}</td>
                                        <td>{{ $item->causa_muerte }}</td>
                                        <td>{{ $item->tipo_vehiculo }}</td>
                                        <td>{{ $item->fecha_suceso_transito }}</td>
                                        <td>{{ $item->fecha_ingreso_cadaver }}</td>
                                        <td>{{ $item->hora }}</td>
                                        <td>{{ $item->direccion_exacta }}</td>
                                        <td>{{ $item->identificacion }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="formVer" style="display: inline-block; margin-right: 5px;" href="{{ route('transito.show', $item->id) }}">
                                                    {!! $btnDetails !!}
                                                </a>
                                                <form class="formEliminar" style="display: inline;" action="{{ route('transito.destroy', $item->id) }}" method="post">
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
                                    <td colspan="25" class="text-center">No se encontraron registros</td>
                                </tr>
                            @endif
                        </x-adminlte-datatable>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
