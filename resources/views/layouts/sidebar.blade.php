<div class="flex-shrink-0 w-64 bg-gray-800 text-white flex flex-col">
    <!-- Logo y Botones de Acción -->
    <div class="h-16 flex items-center justify-between px-4">

        <!-- Logo del Sistema -->
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold">
            SIGGER
        </a>

        <!-- Grupo de Botones de Acción -->
        <div class="flex items-center space-x-2">

            <!-- Botón de Configuración -->
            <a href="{{ route('settings.index') }}"
                class="p-2 rounded-md text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                aria-label="Configuración">

                <!-- Icono de Engranaje (Heroicons) -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path d="M10 3.75a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM17.25 4.5a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM5 3.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM4.25 17a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM17.25 17a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM9 10a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1 0-1.5h5.5A.75.75 0 0 1 9 10ZM17.25 10.75a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM14 10a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM10 16.25a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                </svg>


            </a>

            <!-- Botón de Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="p-2 rounded-md text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                    aria-label="Salir del Sistema">

                    <!-- Icono de Salida (Heroicons) -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>

        </div>
    </div>

    <!-- Menú de Navegación -->
    <nav class="flex-1 px-2 py-4 space-y-2">

        <!-- Enlace al Dashboard -->
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-900' : '' }}">
            <span class="mx-4 font-medium">Escritorio</span>
        </a>

        <!-- Sección de Operaciones Core -->
        <h3 class="px-4 mt-4 mb-2 text-xs uppercase text-gray-400">Operaciones</h3>
        <!-- ============================================================== -->
        <!-- ===== INICIO DEL NUEVO DESPLEGABLE: Causa de Muerte =========== -->
        <!-- ============================================================== -->
        <div x-data="{ open: {{ request()->routeIs('causas.*') ? 'true' : 'false' }} }">
            {{-- Botón que controla el desplegable --}}
            <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-2 rounded-md hover:bg-gray-700 focus:outline-none {{ request()->routeIs('causas.*') ? 'bg-gray-900' : '' }}">
                <span class="mx-4 font-medium">Causa de Muerte</span>
                <svg class="h-5 w-5 transform transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            {{-- Contenido del desplegable --}}
            <div x-show="open" x-transition class="mt-2 space-y-1 pl-8 pr-2">
                <a href="{{ route('causa_muerte.transito.index') }}" 
                   class="block w-full text-left px-4 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->routeIs('causa_muerte.transito.*') ? 'bg-gray-700' : '' }}">
                    Tránsito
                </a>
                <a href="{{ route('causa_muerte.no_transito.index') }}"
                    class="block w-full text-left px-4 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->routeIs('causas.notransito') ? 'bg-gray-700' : '' }}">
                    No Tránsito
                </a>
            </div>
        </div>

        <!-- {{-- Se inicializa el estado con Alpine.js. 'open' será true si alguna ruta de evaluación está activa --}} -->
        <div x-data="{ open: {{ request()->routeIs('evaluaciones.*') ? 'true' : 'false' }} }">
            {{-- Botón que controla el desplegable --}}
            <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-2 rounded-md hover:bg-gray-700 focus:outline-none {{ request()->routeIs('evaluaciones.*') ? 'bg-gray-900' : '' }}">
                <span class="mx-4 font-medium">Evaluaciones</span>
                <svg class="h-5 w-5 transform transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            {{-- Contenido del desplegable.
         'pl-8' indenta todo el bloque de sub-enlaces para una jerarquía clara. --}}
            <div x-show="open" x-transition class="mt-2 space-y-1 pl-8 pr-2">

                <a href="#" {{-- TODO: Cambiar por la ruta real, ej: {{ route('evaluaciones.invivo') }} --}}
                    class="block w-full text-left px-4 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->routeIs('evaluaciones.invivo') ? 'bg-gray-700' : '' }}">
                    In vivo
                </a>

                <a href="#" {{-- TODO: Cambiar por la ruta real, ej: {{ route('evaluaciones.postmortem') }} --}}
                    class="block w-full text-left px-4 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white {{ request()->routeIs('evaluaciones.postmortem') ? 'bg-gray-700' : '' }}">
                    Post Mortem
                </a>
            </div>
        </div>
    </nav>

</div>