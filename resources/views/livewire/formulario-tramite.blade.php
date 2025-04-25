<div x-data="{ tab: 'datos' }" class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl flex justify-center font-bold px-6 py-4">Ingresa los datos solicitados</h1>
        <div class=" overflow-hidden  sm:rounded-lg">
            <div class="flex">
                <!-- Sidebar Tabs -->
                <x-sidebar-tabs/>
                 
                
                {{-- TODO: Agregar scroll tamaño predeterminado --}}
                <form wire:submit.prevent="submit" x-data @submit="$nextTick(() => { window.pasosComponent?.sync() })" class="flex-1 p-8 pl-20 max-w-2xl h-[800px] overflow-y-auto">
                    <section 
                        x-data="{
                            formData: {
                                modalidad: '',
                                fundamentoExtension: '',
                                areaObligada: '',
                                nombreTramite: '',
                                descripcionTramite: '',
                                tipo: [],
                                pasos: [],
                            }
                        }"
                        x-init="$watch('formData', value => $wire.set('formData', JSON.parse(JSON.stringify(value))))"
                    >


                    <div x-show="tab === 'datos'" x-cloak>
                        <x-formulario.datos-tramite />
                    </div>
                
                    <div x-show="tab === 'pasos'" x-cloak>
                        <x-formulario.datos-pasos />
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
                        <div x-data="unidad">
                            <!-- Campos de DOMICILIO -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <x-form.select
                                    x-model="id_inmueble"
                                    name="id_inmueble"
                                    label="Inmueble"
                                    :options="[
                                        '' => 'Seleccione',
                                        '1' => 'Inmueble Niños Héroes No. 119',
                                        '2' => 'Inmueble Niños Héroes No. 132',
                                        '3' => 'Inmueble Niños Héroes No. 150',
                                        '4' => 'Inmueble Torre Norte',
                                        '5' => 'Inmueble Torre Sur',
                                        '6' => 'Inmueble Claudio Bernard',
                                        '7' => 'Inmueble Instituto de Ciencias Forenses',
                                        '8' => 'Inmueble Centro de Justicia alternativa',
                                        '9' => 'Inmueble Patriotismo',
                                        '10' => 'Inmueble Dr. Liceaga',
                                        '11' => 'Inmueble Dr. Lavista',
                                        '12' => 'Inmueble Clementina Gil de Léster',
                                        '13' => 'Inmueble Centro de Desarrollo Infantil Gloria Ledúc de Agüero',
                                        '14' => 'Inmueble Centro de Desarrollo Infantil José María Pino Suarez',
                                        '15' => 'Inmueble Centro de Desarrollo Infantil Niños Héroes',
                                        '16' => 'Inmueble Archivo Delicias',
                                        '17' => 'Inmueble Archivo – Fernando de Alva Ixtlilxóchitl',
                                        '18' => 'Inmueble Archivo Dr. Navarro',
                                        '20' => 'Inmueble Reclusorio Preventivo Norte',
                                        '21' => 'Inmueble Reclusorio Preventivo Sur',
                                        '23' => 'Inmueble Reclusorio Preventivo Oriente',
                                        '24' => 'Inmueble Reclusorio Preventivo Santa Martha Acatitla',
                                        '25' => 'Inmueble Plaza Juarez',
                                        '26' => 'Inmueble Lerma',
                                    ]"
                                    placeholder="Seleccione"
                                />
                                <x-form.input x-model="piso" name="piso" label="Piso" />
                                <x-form.input x-model="unidadAdministrativa" name="unidadAdministrativa" label="Unidad Administrativa" />
                            </div>
                    
                            <button type="button" @click="agregarDomicilio"
                                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm mt-6 transition">
                                <x-lucide-plus-circle class="w-4 h-4" />
                                Agregar domicilio
                            </button>
                    
                            <template x-if="domicilios.length > 0">
                                <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Inmueble/Piso/Unidad</th>
                                            <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(item, index) in domicilios" :key="index">
                                            <tr class="border-b border-gray-700">
                                                <td class="px-4 py-3 align-top" x-text="item"></td>
                                                <td class="px-4 py-3 text-right">
                                                    <button type="button" @click="eliminarDomicilio(index)"
                                                        class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </template>
                    
                            <!-- Campos de HORARIOS -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                <x-form.input x-model="horarioAtencion" name="horarioAtencion" label="Horario de atención al público" />
                                <x-form.input x-model="area" name="area" label="Área" />
                            </div>
                    
                            <button type="button" @click="agregarHorario"
                                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm mt-6 transition">
                                <x-lucide-plus-circle class="w-4 h-4" />
                                Agregar día y hora
                            </button>
                    
                            <template x-if="horarios.length > 0">
                                <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Horario/Área</th>
                                            <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(item, index) in horarios" :key="index">
                                            <tr class="border-b border-gray-700">
                                                <td class="px-4 py-3 align-top" x-text="item"></td>
                                                <td class="px-4 py-3 text-right">
                                                    <button type="button" @click="eliminarHorario(index)"
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

                    <div x-show="tab === 'otrosMedios'" x-cloak>
                        <div x-data="{
                            // Variables para teléfonos
                            numeroTelefono: '',
                            areaTelfono: '',
                            telefonos: [],
                    
                            // Variables para correos
                            correoElectronico: '',
                            areaCorreo: '',
                            correos: [],

                            // Variables para sitios
                            sitioWeb: '',
                            sitiosWeb: [],
                    
                            agregarTelefono() {
                                if (this.numeroTelefono && this.areaTelfono) {
                                    let telefono = `Tel: ${this.numeroTelefono} / Área: ${this.areaTelfono}`;
                                    this.telefonos.push(telefono);
                                    this.numeroTelefono = '';
                                    this.areaTelfono = '';
                                } else {
                                    alert('Completa todos los campos para agregar el teléfono.');
                                }
                            },
                            eliminarTelefono(index) {
                                this.telefonos.splice(index, 1);
                            },
                    
                            agregarCorreo() {
                                if (this.correoElectronico && this.areaCorreo) {
                                    let correo = `Correo: ${this.correoElectronico} / Área: ${this.areaCorreo}`;
                                    this.correos.push(correo);
                                    this.correoElectronico = '';
                                    this.areaCorreo = '';
                                } else {
                                    alert('Completa todos los campos para agregar el correo.');
                                }
                            },
                            eliminarCorreo(index) {
                                this.correos.splice(index, 1);
                            },

                            agregarSitioWeb() {
                                if (this.sitioWeb ) {
                                    let sitio = `Sitio: ${this.sitioWeb}`;
                                    this.sitiosWeb.push(sitio);
                                    this.sitioWeb = '';
                                } else {
                                    alert('Completa todos los campos para agregar el sitio.');
                                }
                            },
                            eliminarSitioWeb(index) {
                                this.sitiosWeb.splice(index, 1);
                            }
                        }">
                    
                            <!-- Campos para Teléfonos -->
                            <div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <x-form.input x-model="numeroTelefono" name="numeroTelefono" label="Núm. Teléfono" />
                                    <x-form.input x-model="areaTelfono" name="areaTelfono" label="Área Teléfono" />
                                </div>
                        
                                <button type="button" @click="agregarTelefono"
                                    class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm mt-6 transition">
                                    <x-lucide-plus-circle class="w-4 h-4" />
                                    Agregar teléfono
                                </button>
                        
                                <template x-if="telefonos.length > 0">
                                    <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Teléfono/Área</th>
                                                <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="(item, index) in telefonos" :key="index">
                                                <tr class="border-b border-gray-700">
                                                    <td class="px-4 py-3 align-top" x-text="item"></td>
                                                    <td class="px-4 py-3 text-right">
                                                        <button type="button" @click="eliminarTelefono(index)"
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
                    
                            <!-- Campos para Correos -->
                            <div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                    <x-form.input x-model="correoElectronico" name="correoElectronico" label="Correo electrónico" />
                                    <x-form.input x-model="areaCorreo" name="areaCorreo" label="Área Email" />
                                </div>
                        
                                <button type="button" @click="agregarCorreo"
                                    class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm mt-6 transition">
                                    <x-lucide-plus-circle class="w-4 h-4" />
                                    Agregar correo
                                </button>
                        
                                <template x-if="correos.length > 0">
                                    <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Correo/Área</th>
                                                <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="(item, index) in correos" :key="index">
                                                <tr class="border-b border-gray-700">
                                                    <td class="px-4 py-3 align-top" x-text="item"></td>
                                                    <td class="px-4 py-3 text-right">
                                                        <button type="button" @click="eliminarCorreo(index)"
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

                            {{-- Campos sitio --}}
                            <div class="mt-8">
                                <x-form.input x-model="sitioWeb" name="sitioWeb" label="Sitios web" />

                                <button type="button" @click="agregarSitioWeb"
                                    class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm mt-6 transition">
                                    <x-lucide-plus-circle class="w-4 h-4" />
                                    Agregar sitios
                                </button>
                        
                                <template x-if="sitiosWeb.length > 0">
                                    <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Correo/Área</th>
                                                <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="(item, index) in sitiosWeb" :key="index">
                                                <tr class="border-b border-gray-700">
                                                    <td class="px-4 py-3 align-top" x-text="item"></td>
                                                    <td class="px-4 py-3 text-right">
                                                        <button type="button" @click="eliminarSitioWeb(index)"
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
                            
                            <x-form.input name="demasDatosMedio" label="Demás datos relativos a cualquier otro medio que permita el envío de consultas, documentos y quejas" placeholder="Ingrese demas datos" />

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
