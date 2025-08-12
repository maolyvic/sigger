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

    <!-- Botón Evaluaciones (Lo he cambiado por Locaciones, como en tu última imagen) -->
    <a href="#" 
       @class([
           'px-4 py-2 font-medium text-sm rounded-md',
           'bg-blue-600 text-white' => $active === 'locaciones',
           'text-gray-700 bg-white hover:bg-gray-100 border' => $active !== 'locaciones'
       ])>
        Locaciones
    </a>

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