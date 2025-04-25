<div x-data="{ tab: 'datos' }" class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold px-6 py-4">Ingresa los datos solicitados</h1>
        <div class=" overflow-hidden  sm:rounded-lg">
            <div class="flex">
                <!-- Sidebar Tabs -->
                <x-sidebar-tabs/>
                 
                
                
                <form wire:submit.prevent="submit" class="flex-1 p-8 pl-20 max-w-2xl">
                    <section 
                        x-data="{
                            formData: {
                                modalidad: '',
                                fundamentoExtension: '',
                                areaObligada: '',
                                nombre_tramite: '',
                                descripcion_tramite: '',
                                tipo: [],
                            }
                        }"
                        x-init="$watch('formData', value => $wire.set('formData', value))"
                    >

                    <div x-show="tab === 'datos'" x-cloak>
                        <x-form.input x-model="formData.modalidad" name="modalidad" label="Modalidad" placeholder="Modalidad" />
                        <x-form.input x-model="formData.fundamentoExtension" name="fundamentoExtension" label="Fundamento Jurídico" placeholder="Ingrese Fundamento" />
                        <x-form.select
                            x-model="formData.areaObligada"
                            name="areaObligada"
                            label="Área obligada responsable"
                            :options="['presencial' => 'Presencial', 'linea' => 'En Línea']"
                            placeholder="Seleccione"
                        />
                        <x-form.input x-model="formData.nombreTramite" name="nombreTramite" label="Nombre del Trámite" placeholder="Nombre" />
                        <x-form.input x-model="formData.descripcionTramite" name="descripcionTramite" label="Descripción" placeholder="Descripcion" />
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2">Tipo de Trámite o Servicio</label>
                            <div class="flex items-center space-x-6">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="servicio" x-model="formData.tipo" class="form-checkbox text-teal-600">
                                    <span class="ml-2">Servicio</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="tramite" x-model="formData.tipo" class="form-checkbox text-teal-600">
                                    <span class="ml-2">Trámite</span>
                                </label>
                            </div>
                        </div>
                    </div>
                
                    <div x-show="tab === 'pasos'" x-cloak>
                        <div x-data="{
                                paso: '',
                                pasos: $wire.get('formData.pasos') || [],
                                agregarPaso() {
                                    if (this.paso.trim() !== '') {
                                        this.pasos.push(this.paso.trim());
                                        $wire.set('formData.pasos', this.pasos); 
                                        this.paso = '';
                                    }
                                },
                                eliminarPaso(index) {
                                    this.pasos.splice(index, 1);
                                    $wire.set('formData.pasos', this.pasos);
                                }
                        }" class="space-y-4">
                        
                            <!-- Input + Botón -->
                            <div>
                                <x-form.input x-model.live='paso' name="modalidad"
                                    tooltip="Descripción con lenguaje claro, sencillo y conciso de los casos en que debe o puede realizarse el trámite o servicio"
                                    label="Pasos que debe de llevar a cabo el particular para su realización" placeholder="Ingrese pasos" />
                            </div>
                            
                            <button type="button" @click="agregarPaso"
                                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
                                <x-lucide-plus-circle class="w-4 h-4" />
                                Agregar paso
                            </button>
                            
                            <!-- Tabla de pasos -->
                            <template x-if="pasos.length > 0">
                                <table class="min-w-full mt-4 text-sm text-gray-800  border-gray-400">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Pasos</th>
                                            <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(item, index) in pasos" :key="index">
                                            <tr class="border-b border-gray-700">
                                                <td class="px-4 py-3 align-top" x-text="item"></td>
                                                <td class="px-4 py-3 text-right">
                                                    <button type="button" @click="eliminarPaso(index)"
                                                        class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </template>
                        </div>
                    </div>
                
                    <div x-show="tab === 'requisitos'" x-cloak>
                        <div x-data="{
                            requisito: '',
                            fundamentoRequisito: '',
                            requisitos: $wire.get('formData.requisitos') || [],
                            fundamentos: $wire.get('formData.fundamentos') || [],
                    
                            agregarRequisito() {
                                if (this.requisito.trim() !== '') {
                                    this.requisitos.push(this.requisito.trim());
                                    $wire.set('formData.requisitos', this.requisitos);
                                    this.requisito = '';
                                }
                            },
                            eliminarRequisito(index) {
                                this.requisitos.splice(index, 1);
                                $wire.set('formData.requisitos', this.requisitos);
                            },
                    
                            agregarFundamentoRequisito() {
                                if (this.fundamentoRequisito.trim() !== '') {
                                    this.fundamentos.push(this.fundamentoRequisito.trim());
                                    $wire.set('formData.fundamentos', this.fundamentos);
                                    this.fundamentoRequisito = '';
                                }
                            },
                            eliminarFundamento(index) {
                                this.fundamentos.splice(index, 1);
                                $wire.set('formData.fundamentos', this.fundamentos);
                            }
                        }" class="space-y-6">
                    
                            <!-- Requisitos -->
                            <div class="space-y-4">
                                <x-form.input 
                                    x-model="requisito" 
                                    name="requisito" 
                                    tooltip="En caso que existan requisitos que necesiten alguna firma, validación, certificación, autorización o visto bueno de un tercero..." 
                                    label="Enumerar y Detallar los Requisitos" 
                                    placeholder="Ingrese requisito" 
                                />
                    
                                <button type="button" @click="agregarRequisito"
                                    class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
                                    <x-lucide-plus-circle class="w-4 h-4" />
                                    Agregar requisito
                                </button>
                    
                                <template x-if="requisitos.length > 0">
                                    <table class="min-w-full text-sm text-gray-800 ">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Requisito</th>
                                                <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="(item, index) in requisitos" :key="index">
                                                <tr class="border-b border-gray-300">
                                                    <td class="px-4 py-3 align-top" x-text="item"></td>
                                                    <td class="px-4 py-3 text-right">
                                                        <button @click="eliminarRequisito(index)" type="button"
                                                            class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm">
                                                            Eliminar
                                                        </button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </template>
                            </div>
                    
                            <!-- Fundamentos jurídicos -->
                            <div class="space-y-4">
                                <x-form.input 
                                    x-model="fundamentoRequisito" 
                                    name="fundamentoRequisito" 
                                    label="Fundamento Jurídico del Requisito" 
                                    placeholder="Ingrese fundamento" 
                                />
                    
                                <button type="button" @click="agregarFundamentoRequisito"
                                    class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
                                    <x-lucide-plus-circle class="w-4 h-4" />
                                    Agregar fundamento
                                </button>
                    
                                <template x-if="fundamentos.length > 0">
                                    <table class="min-w-full text-sm text-gray-800">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Fundamento Jurídico</th>
                                                <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="(item, index) in fundamentos" :key="index">
                                                <tr class="border-b border-gray-300">
                                                    <td class="px-4 py-3 align-top" x-text="item"></td>
                                                    <td class="px-4 py-3 text-right">
                                                        <button @click="eliminarFundamento(index)" type="button"
                                                            class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm">
                                                            Eliminar
                                                        </button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </template>
                            </div>
                        </div>
                    </div>
                    
                    <div x-show="tab === 'documentos'" x-cloak>
                        <x-form.dropzone name="documentosRequeridos[]" label="Documentos requeridos para el tramite o servicio" accept="application/pdf" />
                    </div>
                
                    <div x-show="tab === 'formatos'" x-cloak>
                        <div x-data="{ formatoRequerido: '' }" class="space-y-4">
                            
                            <!-- Radios -->
                            <label class="block text-sm font-semibold mb-2">Formato Requerido</label>
                            <div class="flex items-center space-x-6">
                                <label class="inline-flex items-center">
                                    <input 
                                        type="radio" 
                                        name="formatoRequerido" 
                                        value="1" 
                                        class="form-radio text-teal-600"
                                        x-model="formatoRequerido"
                                    >
                                    <span class="ml-2">Sí</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input 
                                        type="radio" 
                                        name="formatoRequerido" 
                                        value="2" 
                                        class="form-radio text-teal-600"
                                        x-model="formatoRequerido"
                                    >
                                    <span class="ml-2">No</span>
                                </label>
                            </div>
                    
                            <!-- Dropzone visible solo si se selecciona "Sí" -->
                            <div x-show="formatoRequerido === '1'" x-transition>
                                <x-form.dropzone 
                                    name="formatosRequeridos[]" 
                                    label="Formatos requeridos para el trámite o servicio" 
                                    accept="application/pdf"
                                />
                            </div>
                    
                            <x-form.input name="fundamentoFormato" label="Fundamento Juridico Formato" placeholder="Ingrese fundamento" />

                        </div>
                    </div>
                
                    <div x-show="tab === 'verificacion'" x-cloak>
                        <div x-data="{ requiereInspeccion: '' }" class="space-y-4">

                        <label class="block text-sm font-semibold mb-2">Formato Requerido</label>
                            <div class="flex items-center space-x-6">
                                <label class="inline-flex items-center">
                                    <input 
                                        type="radio" 
                                        name="requiereInspeccion" 
                                        value="1" 
                                        class="form-radio text-teal-600"
                                        x-model="requiereInspeccion"
                                    >
                                    <span class="ml-2">Sí</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input 
                                        type="radio" 
                                        name="requiereInspeccion" 
                                        value="2" 
                                        class="form-radio text-teal-600"
                                        x-model="requiereInspeccion"
                                    >
                                    <span class="ml-2">No</span>
                                </label>
                            </div>

                            <div x-show="requiereInspeccion === '1'" x-transition>
                                <x-form.input name="objetivoInspeccion" label="Objetivo de la inspeccion y verificacion" placeholder="Ingrese objetivo" />
                                <x-form.input name="fundamentoInspeccion" label="Fundamento Juridico de la inspeccion" placeholder="Ingrese fundamento" />
                            </div>
                        </div>
                    </div>  
                
                    <div x-show="tab === 'plazo'" x-cloak>
                        <div x-data="{
                            fundamentoPlazo: '',
                            fundamentosPlazo: [],
                            agregarFundamentoPlazo() {
                                if (this.fundamentoPlazo.trim() !== '') {
                                    this.fundamentosPlazo.push(this.fundamentoPlazo.trim());
                                    this.fundamentoPlazo = '';
                                }
                            },
                            eliminarFundamento(index) {
                                this.fundamentosPlazo.splice(index, 1);
                            }
                        }" class="space-y-6">
                        
                            <x-form.input name="plazo" tooltip="Plazo que tiene el sujeto obligado para resolver el trámite o servicio y en su caso si aplica la afirmativa o la negativa ficta" label="Plazo" placeholder="Ingrese plazo" />
                            <x-form.input name="plazoSujeto" label="Plazo con el que cuenta el sujeto obligado para prevenir al solicitante" placeholder="Ingrese plazo" />
                            <x-form.input name="plazoSolicitante" label="Plazo con el que cuenta el solicitante para cumplir con la preventiva" placeholder="Ingrese plazo" />
                    
                            <x-form.input 
                                name="fundamentoPlazo" 
                                x-model="fundamentoPlazo"
                                label="Fundamento Jurídico del plazo" 
                                placeholder="Ingrese fundamento" 
                            />
                            
                            <button type="button" @click="agregarFundamentoPlazo"
                                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
                                <x-lucide-plus-circle class="w-4 h-4" />
                                Agregar fundamento
                            </button>
                    
                            <template x-if="fundamentosPlazo.length > 0">
                                <table class="min-w-full text-sm text-gray-800">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Fundamento Jurídico</th>
                                            <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(item, index) in fundamentosPlazo" :key="index">
                                            <tr class="border-b border-gray-300">
                                                <td class="px-4 py-3 align-top" x-text="item"></td>
                                                <td class="px-4 py-3 text-right">
                                                    <button @click="eliminarFundamento(index)" type="button"
                                                        class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </template>
                        </div>
                    </div>
                    
                    <div x-show="tab === 'monto'" x-cloak>
                        <div x-data="{
                            monto: '',
                            montos: [],
                            agregarMonto() {
                                if (this.monto.trim() !== '') {
                                    this.montos.push(this.monto.trim());
                                    this.monto = '';
                                }
                            },
                            eliminarMonto(index) {
                                this.montos.splice(index, 1);
                            }
                        }" class="space-y-6">

                            <x-form.input 
                                name="monto" 
                                x-model="monto"
                                tooltip="Monto de los derechos o aprovechamientos aplicables, en su caso, o la forma de determinar dicho monto, así como las alternativas"
                                label="Monto" 
                                placeholder="Ingrese monto, forma o alternativa" 
                            />

                        
                            <button type="button" @click="agregarMonto"
                                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
                                <x-lucide-plus-circle class="w-4 h-4" />
                                Agregar fundamento
                            </button>

                            <template x-if="montos.length > 0">
                                <table class="min-w-full text-sm text-gray-800">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Fundamento Jurídico</th>
                                            <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(item, index) in montos" :key="index">
                                            <tr class="border-b border-gray-300">
                                                <td class="px-4 py-3 align-top" x-text="item"></td>
                                                <td class="px-4 py-3 text-right">
                                                    <button @click="eliminarMonto(index)" type="button"
                                                        class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </template>

                            <x-form.input name="fundamentoMonto" label="Fundamento Juridico del monto" placeholder="Ingrese fundamento" />
                            
                        </div>
                    </div>
                
                    <div x-show="tab === 'vigencia'" x-cloak>
                        <div>
                            <x-form.input name="vigencia" label="Vigencia de los avisos, permisos, licencias, autorizaciones, registros, demas resoluciones que se emitan" placeholder="Ingrese vegencia" />
                            <x-form.input name="fundamentoVigencia" label="Fundamento Juridico Vigencia" placeholder="Ingrese fundamento" />
                        </div>
                    </div>
                
                    <div x-show="tab === 'criterio'" x-cloak>
                        <div>
                            <x-form.input name="criterio" label="Criterios de la resolucion del tramite o servicio, en su caso" placeholder="Ingrese criterio" />
                            <x-form.input name="fundamentoCriterio" label="Fundamento Juridico del criterio" placeholder="Ingrese fundamento" />
                        </div>
                    </div>
                
                    <div x-show="tab === 'unidad'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Unidad Administrativa, Domicilio y Horario</h2>
                            <p class="text-gray-600">Indica qué unidad lleva a cabo el trámite, así como su dirección y horario de atención al público.</p>
                        </div>
                    </div>
                
                    <div x-show="tab === 'otrosMedios'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Otros medios</h2>
                            <p class="text-gray-600">Incluye información sobre medios electrónicos, plataformas o herramientas adicionales para realizar el trámite.</p>
                        </div>
                    </div>
                
                    <div x-show="tab === 'informacion'" x-cloak>
                        <div>
                            <x-form.input name="informacion" label="Informacion que debera conservar para fines de acreditacion, inspeccion y verificacion con motivo del tramite o servicio" placeholder="Ingrese informacion" />
                            <x-form.input name="fundamentoInformacion" label="Fundamento Juridico del la informacion" placeholder="Ingrese fundamento" />
                        </div>
                    </div>
                
                    <div x-show="tab === 'estrategia'" x-cloak>
                        <div>
                            <x-form.radiogroup 
                                name="tramiteEnLinea"
                                label="Es posible realizar el tramite o servicio completamente en linea sin acudir a oficinas gubernamentales?"
                                :options="[
                                    '1' => 'Si',
                                    '2' => 'No',
                                ]"
                            />

                            <x-form.radiogroup 
                                name="cargarDocumentos"
                                label="Es posible cargar o subir documentos en linea?"
                                :options="[
                                    '1' => 'Si',
                                    '2' => 'No',
                                ]"
                            />

                            <x-form.radiogroup 
                                name="seguimiento"
                                label="Se puede dar seguimiento? Es decir, mostrar a los interesados el estatus en que se encuentra el tramite o servicio"
                                :options="[
                                    '1' => 'Si',
                                    '2' => 'No',
                                ]"
                            />

                            <x-form.radiogroup 
                                name="informacionMedios"
                                label="Se puede enviar y recibir informacion por medios electronicos con los correspondientes acuses de recepcion de datos y documentos"
                                :options="[
                                    '1' => 'Si',
                                    '2' => 'No',
                                ]"
                            />

                            <x-form.radiogroup 
                                name="respuestaResolucion"
                                label="La resolucion de la respuesta es por internet?"
                                :options="[
                                    '1' => 'Si',
                                    '2' => 'No',
                                ]"
                            />

                            <x-form.radiogroup 
                                name="utilizaFirma"
                                label="Utiliza firma electronica avanzada"
                                :options="[
                                    '1' => 'Si',
                                    '2' => 'No',
                                ]"
                            />

                            <x-form.radiogroup 
                                name="realizarNotificaciones"
                                label="Es posible realizar notificaciones en linea por informacion faltante?"
                                :options="[
                                    '1' => 'Si',
                                    '2' => 'No',
                                ]"
                            />

                            <x-form.input name="demasInformacion" label="Demas informacion que se preevea en la estartegia" placeholder="Ingrese informacion" />

                            <input type="hidden" x-model="formData" wire:model.defer="formData">

                            <div class="pt-4">
                                <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-5 px-6 rounded shadow">
                                    Guardar Información
                                </button>
                            </div>
                    
                        </div>
                    </div>
                </section>
                
                </form>
            </div>
            
        </div>
        
    </div>
</div>
