<nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div>
                <!-- Se puede poner un breadcrumb o título aquí -->
            </div>
            <div class="flex items-center">
                <!-- Dropdown de Usuario -->
                <div class="relative">
                    <button @click="open = !open" class="relative z-10 block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                        {{-- Placeholder para imagen de perfil --}}
                        <div class="h-full w-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Perfil</a>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>