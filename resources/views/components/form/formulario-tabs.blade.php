<form wire:submit.prevent="submit" class="flex-1 p-8 pl-20 max-w-2xl" x-data="{ formData: $wire.formData }">
                
    <div x-show="tab === 'datos'" x-cloak>
       <x-formulario.datos-tramite />
    </div>

    <div x-show="tab === 'pasos'" x-cloak>
        <x-formulario.datos-pasos />
    </div>

    <div x-show="tab === 'requisitos'" x-cloak>
        <x-formulario.datos-requisitos />
    </div>
    
    <div x-show="tab === 'documentos'" x-cloak>
        <x-form.dropzone 
            name="documentosRequeridos"
            label="Documentos requeridos"
            accept="application/pdf"
            multiple
            x-model="formData.documentosRequeridos"
        />

        
        
        @if (!empty($documentosGuardados) && collect($documentosGuardados)->where('tipo', 'documento')->isNotEmpty())
        <div class="mt-8 space-y-3">
            <h3 class="text-lg font-bold text-gray-800 mb-4">📄 Documentos Existentes</h3>
    
            @foreach ($documentosGuardados as $doc)
                @if ($doc['tipo'] === 'documento')
                    <div class="flex items-center justify-between bg-white border rounded-md shadow-sm p-3">
                        <div class="flex items-center gap-3">
                            @php
                                $extension = pathinfo($doc['name'], PATHINFO_EXTENSION);
                            @endphp
    
                            @if ($extension === 'pdf')
                                <div class="w-10 h-10 flex items-center justify-center rounded-md">
                                    📄
                                </div>
                            @else
                                <div class="w-10 h-10 bg-gray-100 flex items-center justify-center rounded-md">
                                    📎
                                </div>
                            @endif
    
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ $doc['name'] }}</p>
                                <p class="text-xs text-gray-500">{{ number_format($doc['size'] / 1024, 1) }} KB</p>
    
                                <a href="{{ asset('storage/' . $doc['ruta']) }}" 
                                   target="_blank" 
                                   class="text-xs text-teal-600 underline mt-1 block">
                                    Ver archivo
                                </a>
                            </div>
                        </div>
    
                        <button 
                            type="button" 
                            wire:click="eliminarDocumentoExistente({{ $doc['id'] }})"
                            class="p-1 rounded-full hover:bg-red-100"
                        >
                            <x-lucide-x class="w-4 h-4 text-red-500" />
                        </button>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
    
        
    </div>

    <div x-show="tab === 'formatos'" x-cloak>
       <x-formulario.datos-formatos />

       @if (!empty($documentosGuardados) && collect($documentosGuardados)->where('tipo', 'formato')->isNotEmpty())
       <div class="mt-8 space-y-3">
           <h3 class="text-lg font-bold text-gray-800 mb-4">📄 Formatos Existentes</h3>
   
           @foreach ($documentosGuardados as $doc)
               @if ($doc['tipo'] === 'formato')
                   <div class="flex items-center justify-between bg-white border rounded-md shadow-sm p-3">
                       <div class="flex items-center gap-3">
                           @php
                               $extension = pathinfo($doc['name'], PATHINFO_EXTENSION);
                           @endphp
   
                           @if ($extension === 'pdf')
                               <div class="w-10 h-10 flex items-center justify-center rounded-md">
                                   📄
                               </div>
                           @else
                               <div class="w-10 h-10 bg-gray-100 flex items-center justify-center rounded-md">
                                   📎
                               </div>
                           @endif
   
                           <div>
                               <p class="text-sm font-medium text-gray-800">{{ $doc['name'] }}</p>
                               <p class="text-xs text-gray-500">{{ number_format($doc['size'] / 1024, 1) }} KB</p>
   
                               <a href="{{ asset('storage/' . $doc['ruta']) }}" 
                                  target="_blank" 
                                  class="text-xs text-teal-600 underline mt-1 block">
                                   Ver archivo
                               </a>
                           </div>
                       </div>
   
                       <button 
                           type="button" 
                           wire:click="eliminarDocumentoExistente({{ $doc['id'] }})"
                           class="p-1 rounded-full hover:bg-red-100"
                       >
                           <x-lucide-x class="w-4 h-4 text-red-500" />
                       </button>
                   </div>
               @endif
           @endforeach
       </div>
   @endif
   
    
    </div>

    <div x-show="tab === 'verificacion'" x-cloak>
        <x-formulario.datos-inspeccion />
    </div>  

    <div x-show="tab === 'plazo'" x-cloak>
        <x-formulario.datos-plazo />
    </div>
    
    <div x-show="tab === 'monto'" x-cloak>
        <x-formulario.datos-montos />
    </div>

    <div x-show="tab === 'vigencia'" x-cloak>
        <div>
            <x-form.input x-model=formData.vigencia name="vigencia" label="Vigencia de los avisos, permisos, licencias, autorizaciones, registros y demás resoluciones que se emitan" placeholder="Ingrese vegencia" />
            <x-form.input x-model=formData.fundamentoVigencia name="fundamentoVigencia" label="Fundamento Jurídico Vigencia" placeholder="Ingrese fundamento" />
        </div>
    </div>

    <div x-show="tab === 'criterio'" x-cloak>
        <div>
            <x-form.input x-model=formData.criterio name="criterio" label="Criterios de resolución del trámite o servicio, en su caso" placeholder="Ingrese criterio" />
            <x-form.input x-model=formData.fundamentoCriterio name="fundamentoCriterio" label="Fundamento Juridico del criterio" placeholder="Ingrese fundamento" />
        </div>
    </div>

    <div x-show="tab === 'unidad'" x-cloak>
        <x-formulario.datos-unidad />
    </div>
    
    <div x-show="tab === 'otrosMedios'" x-cloak>
       <x-formulario.datos-otrosmedios />
    </div>

    <div x-show="tab === 'informacion'" x-cloak>
        <div>
            <x-form.input x-model=formData.informacion name="informacion" label="Informacion que debera conservar para fines de acreditacion, inspeccion y verificacion con motivo del tramite o servicio" placeholder="Ingrese informacion" />
            <x-form.input x-model=formData.fundamentoInformacion name="fundamentoInformacion" label="Fundamento Jurídico de la Información" placeholder="Ingrese fundamento" />
        </div>
    </div>

    <div x-show="tab === 'estrategia'" x-cloak>
        <x-formulario.datos-estrategia />

        <div class="pt-4 flex flex-wrap gap-4">

            @if ($fkestatus == 1)
                <!-- Botón Enviar a Revisión -->
                <button 
                type="button" 
                wire:click="enviarRevision"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded shadow flex items-center justify-center gap-2"
                wire:loading.attr="disabled"
                wire:target="enviarRevision"
                >
                <span wire:loading.remove wire:target="enviarRevision">
                    Enviar a Revisión
                </span>
                <span wire:loading wire:target="enviarRevision">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                </span>
                </button>

                <!-- Botón Guardar Cambios -->
                <button 
                type="submit" 
                class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-6 rounded shadow flex items-center justify-center gap-2"
                wire:loading.attr="disabled"
                wire:target="submit"
                >
                <span wire:loading.remove wire:target="submit">
                    Guardar Cambios
                </span>
                <span wire:loading wire:target="submit">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                </span>
                </button>

            @endif
        
            <a 
                href="{{ route('vista.consulta', ['id' => $tramiteServicioId]) }}" 
                target="_blank"
                class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded shadow inline-block text-center"
                wire:loading.attr="disabled"
                wire:target="submit"
            >
                <span wire:loading.remove wire:target="submit">Vista Previa</span>
                <span wire:loading wire:target="submit">Espere...</span>
            </a>
        
            
        </div>
        
        
    </div>                
</form>