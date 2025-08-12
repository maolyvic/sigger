<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Escritorio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Gráfica 1: Barras (Ingreso de Cadáveres - Mes Actual) -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold mb-4">Ingreso de Cadáveres (Mes Actual)</h3>
                        <div class="relative h-96">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Gráfica 2: Dona (Distribución por Causa de Muerte) -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold mb-4">Distribución por Causa de Muerte</h3>
                        <div class="relative h-96">
                            <canvas id="doughnutChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Gráfica 3: Líneas (Tendencia de Ingresos Mensuales) -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg lg:col-span-2">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold mb-4">Tendencia de Ingresos Mensuales</h3>
                        <div class="relative h-96">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Script para inicializar las gráficas con la temática de "cadáveres" --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- GRÁFICA 1: Ingreso de Cadáveres - Mes Actual (Barras) ---
            const ctxBar = document.getElementById('barChart').getContext('2d');
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
                    datasets: [{
                        label: 'N° de Ingresos',
                        data: [45, 62, 55, 70], // Datos de ejemplo
                        backgroundColor: 'rgba(239, 68, 68, 0.6)', // Color rojo
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } }
                }
            });

            // --- GRÁFICA 2: Distribución por Causa de Muerte (Dona) ---
            const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
            new Chart(ctxDoughnut, {
                type: 'doughnut',
                data: {
                    labels: ['Accidente de Tránsito', 'Homicidio', 'Causas Naturales', 'Por Determinar'],
                    datasets: [{
                        label: 'Cantidad',
                        data: [80, 110, 65, 40], // Datos de ejemplo
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',  // Azul
                            'rgba(255, 99, 132, 0.6)',  // Rojo
                            'rgba(75, 192, 192, 0.6)',  // Verde-azulado
                            'rgba(153, 102, 255, 0.6)' // Morado
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            // --- GRÁFICA 3: Tendencia de Ingresos Mensuales (Líneas) ---
            const ctxLine = document.getElementById('lineChart').getContext('2d');
            new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'],
                    datasets: [{
                        label: 'Total Ingresos',
                        data: [210, 250, 230, 280, 260, 310, 290, 320], // Datos de ejemplo
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)',
                        tension: 0.2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        });
    </script>
</x-app-layout>