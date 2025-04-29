<div class="min-h-screen bg-white text-gray-800 grid grid-cols-1 md:grid-cols-[220px_1fr]">

    <!-- Menú lateral -->
    <aside class="bg-gray-100 p-4 md:p-6 md:min-h-screen">
        <nav class="space-y-4">
            <a href="#" class="flex justify-start items-center space-x-2 hover:text-teal-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Todos</span>
            </a>
        </nav>
    </aside>

    <!-- Contenido principal -->
    <main class="p-6 md:p-8 w-full">

        <div class="mb-6">
            <input 
                type="text" 
                wire:model.live="search" 
                placeholder="Buscar trámite o servicio..." 
                class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
            >
        </div>
        <!-- Tabs -->
        <div class="flex space-x-4 border-b mb-6">
            <button wire:click="setTipo('tramite')"
                class="px-4 py-2 font-semibold border-b-2 transition
                {{ $tipoActivo === 'tramite' ? 'border-teal-600 text-teal-700' : 'border-transparent text-gray-500 hover:text-teal-600' }}">
                Trámites
            </button>
            <button wire:click="setTipo('servicio')"
                class="px-4 py-2 font-semibold border-b-2 transition
                {{ $tipoActivo === 'servicio' ? 'border-teal-600 text-teal-700' : 'border-transparent text-gray-500 hover:text-teal-600' }}">
                Servicios
            </button>
        </div>

        <!-- Tarjetas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-start">
            @forelse ($tramites as $tramite)
                <a href="{{ route('vista.consulta', $tramite->id) }}"
                   class="self-start bg-white shadow-sm rounded-md p-3 py-5 flex items-start gap-2 border transition-all duration-200 hover:shadow-lg hover:border-teal-500 hover:bg-teal-50 text-sm group"
                >
                    <div class="bg-gray-100 rounded-full p-2 shadow-inner group-hover:bg-teal-100 transition">
                        <svg class="w-4 h-4 text-teal-600 group-hover:text-teal-800 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-800 text-sm mb-1 leading-tight group-hover:text-teal-800">
                            {{ $tramite->nombre_tramite }}
                        </h3>
                        <p class="text-gray-600 text-xs leading-snug line-clamp-2 group-hover:text-teal-700">
                            {{ $tramite->descripcion }}
                        </p>
                    </div>
                </a>
            @empty
                <p class="col-span-2 text-center text-gray-500">No hay resultados para este tipo.</p>
            @endforelse
        </div>

    </main>
</div>
