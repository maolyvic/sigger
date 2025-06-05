@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.ChartJS', true)

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Gráfico 1
                </div>
                <div class="card-body">
                    <canvas id="chart1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Gráfico 2
                </div>
                <div class="card-body">
                    <canvas id="chart2"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Gráfico 3
                </div>
                <div class="card-body">
                    <canvas id="chart3"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        // Gráfico 1 - Barra
        new Chart(document.getElementById('chart1'), {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May'],
                datasets: [{
                    label: 'Ventas',
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }]
            }
        });

        // Gráfico 2 - Línea
        new Chart(document.getElementById('chart2'), {
            type: 'line',
            data: {
                labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie'],
                datasets: [{
                    label: 'Usuarios',
                    data: [5, 9, 7, 8, 6],
                    borderColor: 'rgba(255, 99, 132, 0.8)',
                    fill: false
                }]
            }
        });

        // Gráfico 3 - Pastel
        new Chart(document.getElementById('chart3'), {
            type: 'pie',
            data: {
                labels: ['Rojo', 'Azul', 'Amarillo'],
                datasets: [{
                    data: [10, 20, 30],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ]
                }]
            }
        });
    </script>
    @endpush
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop