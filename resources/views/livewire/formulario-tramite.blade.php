<div x-data="{ tab: 'datos' }" class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold px-6 py-4">Ingresa los datos solicitados</h1>
        <div class=" overflow-hidden  sm:rounded-lg">
            <div class="flex">
                <!-- Sidebar Tabs -->
                <x-sidebar-tabs/>
                 
                
                
                <!-- Main Content Area -->
                <section class="flex-1 p-8  pl-20 max-w-2xl">
                    <div x-show="tab === 'datos'" x-cloak>
                        <div>
                            <x-form.input name="modalidad" label="Modalidad" placeholder="Modalidad" />
                            <x-form.input name="fj_extension" label="Fundamento Jurídico de la Existencia del Trámite o Servicio" placeholder="Fundamento Jurídico de la Existencia del Trámite o Servicio" />
                            <x-form.select
                                name="area_obligada"
                                label="Área obligada responsable"
                                :options="[
                                    'presencial' => 'Presencial',
                                    'linea' => 'En Línea',
                                ]"
                                placeholder="Seleccione"
                            />
                            <x-form.input name="nombre_tramite" label="Nombre del Trámite o Servicio" placeholder="Nombre del Trámite o Servicio" />
                            <x-form.input name="descripcion_tramite" label="Descripción del Trámite o Servicio" placeholder="Descripción del Trámite o Servicio" />
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
                        
                        </div>
                    </div>
                
                    <div x-show="tab === 'pasos'" x-cloak>
                        <div x-data="{
                                paso: '',
                                pasos: [],
                                agregarPaso() {
                                    if (this.paso.trim() !== '') {
                                        this.pasos.push(this.paso.trim());
                                        this.paso = '';
                                    }
                                },
                                eliminarPaso(index) {
                                    this.pasos.splice(index, 1);
                                }
                            }" 
                        class="space-y-4">
                        
                            <!-- Input + Botón -->
                            <div>
                                <x-form.input x-model='paso' name="modalidad" tooltip="Descripción con lenguaje claro, sencillo y conciso de los casos en que debe o puede realizarse el trámite o servicio" label="Pasos que debe de llevar a cabo el particular para su realización" placeholder="Ingrese pasos" />
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
                            requisitos: [],
                            agregarRequisito() {
                                if (this.requisito.trim() !== '') {
                                    this.requisitos.push(this.requisito.trim());
                                    this.requisito = '';
                                }
                            },
                            eliminarRequisito(index) {
                                this.requisitos.splice(index, 1);
                            }
                        }" class="space-y-4">
                    
                            <!-- Input + Botón -->
                            <div>
                                <x-form.input 
                                    x-model="requisito" 
                                    name="requisito" 
                                    tooltip="En caso que existan requisitos que necesiten alguna firma, validación, certificación, autorización o visto bueno de un tercero, deberá señalar la persona o empresa que lo emita. En caso de que el trámite o servicio que se esté inscribiendo incluya como requisitos la realización de trámites o servicios adicionales deberá de identificar plenamente los mismos, señalando además el sujeto obligado ante quien se realiza" 
                                    label="Enumerar y Detallar los Requisitos" 
                                    placeholder="Ingrese requisito" 
                                />
                            </div>
                    
                            <button type="button" @click="agregarRequisito"
                                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
                                <x-lucide-plus-circle class="w-4 h-4" />
                                Agregar requisito
                            </button>
                    
                            <!-- Tabla de requisitos -->
                            <template x-if="requisitos.length > 0">
                                <table class="min-w-full mt-4 text-sm text-gray-800  border-gray-400">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Requisito</th>
                                            <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(item, index) in requisitos" :key="index">
                                            <tr class="border-b border-gray-700">
                                                <td class="px-4 py-3 align-top" x-text="item"></td>
                                                <td class="px-4 py-3 text-right">
                                                    <button type="button" @click="eliminarRequisito(index)"
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
                    
                
                    <div x-show="tab === 'documentos'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Documentos requeridos</h2>
                            <p class="text-gray-600">Agrega los documentos que el ciudadano debe presentar para realizar el trámite o servicio.</p>
                        </div>
                    </div>
                
                    <div x-show="tab === 'formatos'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Formatos</h2>
                            <p class="text-gray-600">Proporciona los formatos oficiales que deben llenarse o anexarse como parte del trámite.</p>
                        </div>
                    </div>
                
                    <div x-show="tab === 'verificacion'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Inspección o Verificación</h2>
                            <p class="text-gray-600">Indica si el trámite requiere alguna verificación, inspección o supervisión por parte de la autoridad.</p>
                        </div>
                    </div>
                
                    <div x-show="tab === 'plazo'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Plazo</h2>
                            <p class="text-gray-600">Indica el tiempo máximo que tiene la autoridad para resolver el trámite o solicitud.</p>
                        </div>
                    </div>
                
                    <div x-show="tab === 'monto'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Monto</h2>
                            <p class="text-gray-600">Especifica los costos, tarifas o derechos que el ciudadano debe pagar para realizar el trámite.</p>
                        </div>
                    </div>
                
                    <div x-show="tab === 'vigencia'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Vigencia</h2>
                            <p class="text-gray-600">Indica cuánto tiempo tiene validez el resultado del trámite (documento, resolución, permiso, etc.).</p>
                        </div>
                    </div>
                
                    <div x-show="tab === 'criterio'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Criterio</h2>
                            <p class="text-gray-600">Muestra los criterios normativos, técnicos o jurídicos que se aplican para resolver el trámite.</p>
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
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Información adicional</h2>
                            <p class="text-gray-600">Espacio para proporcionar información complementaria, observaciones o notas importantes.</p>
                        </div>
                    </div>
                
                    <div x-show="tab === 'estrategia'" x-cloak>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Sección: Estrategia</h2>
                            <p class="text-gray-600">Aquí puedes agregar información establecida por políticas institucionales, objetivos estratégicos o metas de mejora.</p>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
    </div>
</div>
