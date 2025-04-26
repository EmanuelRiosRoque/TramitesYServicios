<div class="max-w-4xl mx-auto py-8">
    <!-- Título -->
    <h2 class="text-2xl font-extrabold text-center text-gray-800 mb-6">
        Estos son los trámites y servicios que tiene asignada tu área
    </h2>

    <!-- Tabs -->
    <div class="flex border-b mb-6">
        <button class="px-4 py-2 border-b-2 border-teal-500 text-teal-600 font-semibold">Todos</button>
        <button class="px-4 py-2 text-gray-600 hover:text-teal-600">Trámite</button>
        <button class="px-4 py-2 text-gray-600 hover:text-teal-600">Servicio</button>
    </div>

    <!-- Lista de elementos -->
    <div class="space-y-4">
        @foreach ($tramites as $tramite)
            <div class="bg-white shadow-md rounded-md p-4 flex justify-between items-center">
                <span class="text-gray-700 font-medium">{{ $tramite->nombre_tramite_servicio }}</span>
                <a href="{{ route('formulario.tramite', $tramite->id) }}" 
                    class="text-sm text-gray-600 hover:text-teal-600 flex items-center space-x-1">
                    <x-lucide-eye class="w-5 h-5 text-gray-600" />
                    <span>Editar</span>
                </a>                
            </div>
        @endforeach
    </div>
</div>
