<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <form action="{{ route('tramite.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-semibold mb-2">Origen Trámite/Servicio</label>
            <div class="flex items-center space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="origen" value="TSJCDMX" class="form-radio text-teal-600">
                    <span class="ml-2">TSJCDMX</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="origen" value="CJCDMX" class="form-radio text-teal-600">
                    <span class="ml-2">CJCDMX</span>
                </label>
            </div>
        </div>

        <!-- Inputs -->
        <div class="grid grid-cols-1 gap-3">
            <div>
                <label class="block text-sm font-semibold mb-1" for="input1">Nombre del Trámite o Servicio</label>
                <input 
                    type="text" 
                    id="input1" 
                    name="input1" 
                    placeholder="Nombre"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-teal-300"
                >
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1" for="input2">Descripción del Trámite o Servicio</label>
                <input 
                    type="text" 
                    id="input2" 
                    name="input2"
                    placeholder="Descripción" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-teal-300"
                >
            </div>
        </div>

        <!-- Checkboxes: Tipo -->
        <div class="flex gap-8">
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-2">Tipo de Trámite o Servicio</label>
                <div class="flex items-center space-x-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="tipo[]" value="servicio" class="form-checkbox text-teal-600">
                        <span class="ml-2">Servicio</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="tipo[]" value="tramite" class="form-checkbox text-teal-600">
                        <span class="ml-2">Trámite</span>
                    </label>
                </div>
            </div>
    
            <!-- Radios: Formato requerido -->
            <div>
                <label class="block text-sm font-semibold mb-2">Formato requerido</label>
                <div class="flex items-center space-x-6">
                    <label class="inline-flex items-center">
                        <input type="radio" name="formato" value="1" class="form-radio text-teal-600">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="formato" value="2" class="form-radio text-teal-600">
                        <span class="ml-2">No</span>
                    </label>
                </div>
            </div>
        </div>
        
        <!-- Botón Guardar -->
        <div class="pt-4">
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-5 px-6 rounded shadow">
                Guardar Información
            </button>
        </div>

    </form>
</div>
