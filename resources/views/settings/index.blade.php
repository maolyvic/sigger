<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div>
                <h1 class="text-2xl font-bold text-gray-800">Configuración del Sistema</h1>
                <p class="mt-1 text-sm text-gray-600">Gestiona las opciones y preferencias generales de la aplicación.</p>
            </div>

            <!-- =================================================== -->
            <!--       AQUÍ USAMOS EL NUEVO COMPONENTE              -->
            <!-- =================================================== -->
            {{--
                Llamamos al componente 'settings-tabs' y le pasamos la prop 'active'
                con el valor 'general' para que resalte ese botón.
            --}}
            <x-settings-tabs active="general" />

            <!-- CONTENIDO DE LA PESTAÑA SELECCIONADA -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- ... El resto de tu formulario no necesita cambios ... --}}
                <a href="#"></a>
                <form method="POST" action="#">
                    @csrf
                    @method('PATCH')
                    
                    {{-- ... contenido del formulario ... --}}
                </form>
            </div>

        </div>
    </div>
</x-app-layout>