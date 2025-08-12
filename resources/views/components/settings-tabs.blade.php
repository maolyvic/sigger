@props(['active'])

<nav class="flex space-x-2">
    
    <!-- Botón General -->
    <a href="#" 
       @class([
           'px-4 py-2 font-medium text-sm rounded-md', // Clases base para todos los botones
           'bg-blue-600 text-white' => $active === 'general', // Estilo ACTIVO: Fondo azul, texto blanco
           'text-gray-700 bg-white hover:bg-gray-100 border' => $active !== 'general' // Estilo INACTIVO: Fondo blanco, texto oscuro
       ])>
        General
    </a>

    <div x-data="{ open: false }" @click.away="open = false" class="relative">
        
        <!-- Botón que abre/cierra el desplegable -->
        <button @click="open = !open"
                @class([
                    'inline-flex items-center px-4 py-2 font-medium text-sm rounded-md w-full',
                    'bg-blue-600 text-white' => request()->routeIs('settings.locations.*'), // Se activa para cualquier ruta de locaciones
                    'text-gray-700 bg-white hover:bg-gray-100 border' => !request()->routeIs('settings.locations.*')
                ])>
            <span>Locaciones</span>
            <svg class="ml-2 -mr-1 h-5 w-5 transform transition-transform duration-200" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Contenido del Menú Desplegable -->
        <div x-show="open"
             x-transition
             @click="open = false"
             style="display: none;"
             class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none origin-top-left">
            <div class="py-1">
                <a href="{{ route('settings.locations.municipios.index') }}"
                   @class([
                       'block px-4 py-2 text-sm',
                       'bg-gray-100 text-gray-900' => request()->routeIs('settings.locations.municipios.*'),
                       'text-gray-700 hover:bg-gray-100 hover:text-gray-900' => !request()->routeIs('settings.locations.municipios.*')
                   ])>
                    Municipios
                </a>
                <a href="{{ route('settings.locations.parroquias.index') }}"
                   @class([
                       'block px-4 py-2 text-sm',
                       'bg-gray-100 text-gray-900' => request()->routeIs('settings.locations.parroquias.*'),
                       'text-gray-700 hover:bg-gray-100 hover:text-gray-900' => !request()->routeIs('settings.locations.parroquias.*')
                   ])>
                    Parroquias
                </a>
                <a href="{{ route('settings.locations.sectores.index') }}"
                   @class([
                       'block px-4 py-2 text-sm',
                       'bg-gray-100 text-gray-900' => request()->routeIs('settings.locations.sectores.*'),
                       'text-gray-700 hover:bg-gray-100 hover:text-gray-900' => !request()->routeIs('settings.locations.sectores.*')
                   ])>
                    Sectores
                </a>
            </div>
        </div>
    </div>

    <!-- Botón Reportes -->
    <a href="#" 
       @class([
           'px-4 py-2 font-medium text-sm rounded-md',
           'bg-blue-600 text-white' => $active === 'reportes',
           'text-gray-700 bg-white hover:bg-gray-100 border' => $active !== 'reportes'
       ])>
        Reportes
    </a>

    <a href="#"
       @class([
           'px-4 py-2 font-medium text-sm rounded-md',
           'bg-blue-600 text-white' => $active === 'Roles',
           'text-gray-700 bg-white hover:bg-gray-100 border' => $active !== 'roles'
       ])>
        Roles & Permisos
    </a>
    
</nav>