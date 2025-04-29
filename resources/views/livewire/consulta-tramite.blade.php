<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Título -->
    <h2 class="text-xl sm:text-2xl font-extrabold text-center text-gray-800 mb-6">
        Estos son los trámites y servicios que tiene asignada tu área
    </h2>

    <!-- Tabs -->
    <div class="flex overflow-x-auto border-b mb-6 space-x-4 sm:justify-center">
        <button class="flex-shrink-0 px-4 py-2 border-b-2 border-teal-500 text-teal-600 font-semibold whitespace-nowrap">
            Todos
        </button>
        <button class="flex-shrink-0 px-4 py-2 text-gray-600 hover:text-teal-600 whitespace-nowrap">
            Trámite
        </button>
        <button class="flex-shrink-0 px-4 py-2 text-gray-600 hover:text-teal-600 whitespace-nowrap">
            Servicio
        </button>
    </div>

    <!-- Lista de elementos -->
    <div class="space-y-4">
        @foreach ($tramites as $tramite)
            <div class="bg-white shadow-md rounded-md p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <span class="text-gray-700 font-medium">{{ $tramite->nombre_tramite }}</span>

                <a href="{{ route('formulario.tramite', $tramite->id) }}"
                    class="text-sm text-gray-600 hover:text-teal-600 flex items-center space-x-1">
                    
                    @switch($tramite->fk_estatus)
                        @case(1)
                            <x-lucide-pencil class="w-5 h-5 text-gray-600" />
                            <span>Editar</span>
                            @break

                        @case(2)
                            <x-lucide-eye class="w-5 h-5 text-gray-600" />
                            @if (Auth::user()->hasRole('Revisor'))
                                <span>Revisar</span>
                            @else
                                <span>En revisión</span>
                            @endif
                            @break

                        @case(3)
                            <x-lucide-file-warning class="w-5 h-5 text-gray-600" />
                            <span>Rechazado</span>
                            @break

                        @case(4)
                            <x-lucide-badge-check class="w-5 h-5 text-gray-600" />
                            <span>Publicado</span>
                            @break

                        @default
                            <x-lucide-help-circle class="w-5 h-5 text-gray-600" />
                            <span>Desconocido</span>
                    @endswitch
                </a>
            </div>
        @endforeach
    </div>
</div>
