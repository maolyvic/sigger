<!DOCTYPE html>
{{-- Añade la clase h-full para asegurar que el HTML ocupe toda la altura --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIGGER') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('scripts')
</head>

{{-- Añade h-full también al body y quita el color de fondo --}}
<body class="font-sans antialiased h-full">

    {{-- 1. Usa min-h-screen en lugar de h-screen para más robustez.
         2. Mueve el color de fondo del body a este div principal. --}}
    <div class="flex min-h-screen bg-gray-100">

        <!-- Barra Lateral (Sidebar) -->
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Barra de Navegación Superior -->
            @include('layouts.navigation')

            <!-- Contenido Principal de la Página -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto"> {{-- El color de fondo ya está en el div padre --}}
                <div class="container mx-auto px-6 py-8">

                    <!-- Cabecera de la Página (Opcional) -->
                    @if (isset($header))
                    <header class="mb-6">
                        {{-- Corregido: La etiqueta <h2> no debe estar anidada --}}
                        <h2 class="text-2xl font-semibold text-gray-700">
                            {{ $header }}
                        </h2>
                    </header>
                    @endif

                    <!-- El contenido real de la página se insertará aquí -->
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>