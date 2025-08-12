<div class="flex-shrink-0 w-64 bg-gray-800 text-white flex flex-col">
    <!-- Logo o Nombre del Sistema -->
    <div class="h-16 flex items-center justify-center text-2xl font-bold">
        <a href="{{ route('dashboard') }}">SIGGER</a>
    </div>

    <!-- Menú de Navegación -->
    <nav class="flex-1 px-2 py-4 space-y-2">

        <!-- Enlace al Dashboard -->
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-900' : '' }}">
            <span class="mx-4 font-medium">Escritorio</span>
        </a>

        <!-- Sección de Operaciones Core -->
        <h3 class="px-4 mt-4 mb-2 text-xs uppercase text-gray-400">Operaciones</h3>

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
         `pl-8` indenta todo el bloque de sub-enlaces para una jerarquía clara. --}}
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

    <!-- Sección de Logout -->
    <div class="mt-auto p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();"
                class="flex items-center w-full px-4 py-2 rounded-md text-red-300 hover:bg-red-700 hover:text-white">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="mx-4 font-medium">Salir del Sistema</span>
            </a>
        </form>
    </div>
</div>