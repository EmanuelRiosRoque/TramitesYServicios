<nav x-data="{ open: false }" class="bg-gradient-to-r from-teal-700 to-teal-500 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 h-[150px] flex flex-col justify-between relative text-white">

        <!-- Sección superior: navegación -->
        <div class="flex items-center justify-between m-4 z-10">
            <!-- Logo + Nombre -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('img/logo-w.png') }}" class="h-10" alt="Logo PJCDMX">
                </a>
                <div class="hidden sm:block font-semibold text-sm">
                    {{ Auth::user()->name }}
                </div>
            </div>
        
            <!-- Enlaces navegación -->
            <div class="hidden sm:flex space-x-4 items-center text-sm font-semibold">

                {{-- TODO: Hacer que resalten cuando esten activos --}}
                <a href="{{ route('consulta.tramite') }}"
                    class="bg-white text-teal-700 px-4 py-2 rounded-md shadow hover:bg-gray-100 transition cursor-pointer">
                    Consulta Trámites/Servicios
                </a>

                <a href="{{ route('dashboard') }}"
                    class="bg-white text-teal-700 px-4 py-2 rounded-md shadow hover:bg-gray-100 transition cursor-pointer">
                    Registro Trámites/Servicios
                </a>

                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-md shadow hover:bg-red-600 transition">
                        Cerrar sesión
                    </button>
                </form>
            </div>
            
        </div>
        
    
        <!-- Sección central: título -->
        <div class="text-center z-10 mt-3 animate__animated animate__fadeIn">
            <h1 class="text-xl sm:text-3xl font-extrabold leading-tight">
                Sistema de Ingreso de Trámites y Servicios del PJCDMX
            </h1>
        
            {{-- <div class="mr-40 flex justify-end animate__animated animate__fadeInRight">
                <img src="{{ asset('img/b_man_two.png') }}"
                     class="h-32 mr-20"
                     alt="Ilustración persona">
            </div> --}}
        </div>
        
    
        <!-- SVG edificios a la izquierda -->
        <img src="{{ asset('img/v_2.svg') }}" class="absolute bottom-0 left-0 h-28 z-0" alt="Decoración izquierda">
    
        <!-- SVG edificios a la derecha -->
        <img src="{{ asset('img/v_2.svg') }}" class="absolute bottom-0 right-0 h-28 z-0" alt="Decoración derecha">
    
        <!-- Persona ilustrada encima del edificio derecho -->
        
    
    </div>
    
    

    <!-- Responsive menú hamburguesa -->
    <div class="sm:hidden px-4 pb-4" :class="{ 'block': open, 'hidden': !open }">
        <div class="space-y-2">
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button class="block text-white hover:underline" type="submit">Cerrar sesión</button>
            </form>
        </div>
    </div>
</nav>
