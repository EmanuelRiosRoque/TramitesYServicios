<div x-data="validaciones($wire)">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold px-6 py-4">Ingresa los datos solicitados</h1>
        <div class=" overflow-hidden  sm:rounded-lg">
            @if ($errors->has('global'))
                <p class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    {{ $errors->first('global') }}
                </p>
            @endif
            <div class="flex">

                <!-- Sidebar Tabs -->
                <x-sidebar-tabs/>
                             
                <!-- Sidebar Tabs -->

                <x-form.formulario-tabs 
                :documentos-guardados="$documentosGuardados" 
                :fkestatus="$fk_estatus"
                :tramite-servicio-id="$tramiteServicioId"
                />
            


            </div>
            <!-- Botones de Navegación -->
           
            <div class="flex justify-end mt-6 px-6">
                <div class="flex items-center space-x-4">
            
                    <!-- Botón Anterior -->
                    <button 
                        type="button"
                        @click="previous"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded disabled:opacity-50 transition"
                        :disabled="currentIndex === 0"
                    >
                        Anterior
                    </button>
            
                    <!-- Botón Siguiente -->
                    <button 
                        type="button"
                        @click="next"
                        class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded disabled:opacity-50 transition flex items-center gap-2"
                        :disabled="currentIndex === tabs.length - 1"
                    >
                        Siguiente
                        <template x-if="camposInvalidos.length">
                            <span class="bg-red-600 text-white text-xs rounded-full px-2 py-0.5">
                                !
                            </span>
                        </template>
                    </button>
            
                </div>
            
             
            </div>
            
            
        </div>
    </div>
</div>
