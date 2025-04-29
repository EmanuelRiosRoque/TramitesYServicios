<div x-data="validaciones($wire, {{ $fk_estatus === 1 ? 'true' : 'false' }}), @js($documentosGuardados)">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold px-6 py-4">Ingresa los datos solicitados</h1>
        <div class=" overflow-hidden  sm:rounded-lg">
            @if ($tramite->fk_estatus == 3 && $tramite->motivo_rechazo)
                <p class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <strong>Motivo de rechazo:</strong> {{ $tramite->motivo_rechazo }}
                </p>
            @endif
            <div class="flex flex-col sm:flex-row gap-6">

                <!-- Tabs (sidebar en desktop, arriba en mobile) -->
                <x-sidebar-tabs/>
            
                <!-- Formulario -->
                <div class="flex-1">
                    <x-form.formulario-tabs 
                        :documentos-guardados="$documentosGuardados" 
                        :fkestatus="$fk_estatus"
                        :tramite-servicio-id="$tramiteServicioId"
                        :mostrarMotivoRechazo="$mostrarMotivoRechazo"
                        :descripcion_rechazo="$descripcion_rechazo"
                    />
            
                    <!-- Botones Anterior / Siguiente -->
                    <div class="flex justify-end mt-6">
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
            
            
            <div x-show="tab === 'estrategia'" class="w-full flex justify-end mt-6 mb-6">
                <div class="flex flex-wrap items-center gap-4">
                    @if ($mostrarMotivoRechazo)
                        <div class="items-center gap-4 w-full">
                            <x-form.input 
                                wire:model="descripcion_rechazo" 
                                name="descripcion_rechazo" 
                                label="Motivo del Rechazo"
                                placeholder="Describa el motivo del rechazo" 
                            />
                            <button 
                                type="button" 
                                wire:click="rechazar"
                                wire:loading.attr="disabled"
                                class="bg-red-700 hover:bg-red-800 text-white font-semibold py-3 px-6 rounded shadow flex items-center justify-center gap-2"
                            >
                                Confirmar Rechazo
                            </button>
                        </div>
                    @endif
            
                    @if ($fk_estatus == 1 || $fk_estatus == 3)
                        <button 
                            type="button" 
                            @click="enviarFormularioAccion('enviarRevision')"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded shadow"
                            wire:loading.attr="disabled"
                            wire:target="enviarRevision"
                        >
                            Enviar a Revisión
                        </button>
            
                        <button 
                            type="button"
                            @click="enviarFormularioAccion('submit')"
                            class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-6 rounded shadow"
                            wire:loading.attr="disabled"
                            wire:target="submit"
                        >
                            Guardar Cambios
                        </button>
                    @endif
            
                    @if (auth()->user()->hasRole('Revisor') && $fk_estatus == 2)
                        <button 
                            type="button" 
                            wire:click="$set('mostrarMotivoRechazo', true)"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded shadow"
                        >
                            Rechazar
                        </button>
            
                        <button 
                            type="button" 
                            wire:click="publicar"
                            class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded shadow"
                        >
                            Aceptar y Publicar
                        </button>
                    @endif
            
                    <a 
                        href="{{ route('vista.consulta', ['id' => $tramiteServicioId]) }}" 
                        target="_blank"
                        class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded shadow inline-block text-center"
                        wire:loading.attr="disabled"
                        wire:target="submit"
                    >
                        Vista Previa
                    </a>
                </div>
            </div>
            
            
            <!-- Botones de Navegación -->
           
          
            
            
        </div>
    </div>
</div>
