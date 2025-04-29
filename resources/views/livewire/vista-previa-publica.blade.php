<div class="min-h-screen bg-white text-gray-800 grid grid-cols-1 md:grid-cols-12">

    <!-- Apartado izquierdo (menú lateral) -->
    <aside class="hidden md:block md:col-span-3 bg-gray-100 p-6">
        <nav class="space-y-4">
            <a href="#" class="flex justify-end items-center space-x-2 hover:text-teal-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Todos</span>
            </a>
            <!-- Aquí podrías agregar más links -->
        </nav>
        
    </aside>

    <!-- Contenido principal -->
    <main class="col-span-12 md:col-span-9 p-8 grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Columna izquierda (contenido) -->
        <div class="space-y-6">
            <div class=" border-b">
                <h1>{{ $tramite->nombre_tramite }}</h1>
            </div>

            <h2 class="text-lg font-bold">Descripción del Trámite o Servicio</h2>
            <p>{{ $tramite->descripcion }}</p>

            <h2 class="text-lg font-bold">Fundamento Jurídico de la Existencia del Trámite o Servicio</h2>
            <p>{{ $tramite->fundamento_existencia }}</p>

            <h2 class="text-lg font-bold">Pasos</h2>
            @if ($tramite->pasos && $tramite->pasos->count())
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->pasos as $paso)
                        <li>{{ $paso->paso }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay pasos registrados.</p>
            @endif
                    {{-- {{ $tramite->requisitos }} --}}
            <h2 class="text-lg font-bold">Requisitos</h2>
            @if ($tramite->requisitos && $tramite->requisitos->count())
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->requisitos as $requisito)
                        <li>{{ $requisito->requisito }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay requisitos registrados.</p>
            @endif

            {{-- {{ $tramite->fundamentoRequisitos }} --}}
            <h2 class="text-lg font-bold">Fundamento Jurídico de Requisitos</h2>
            @if ($tramite->fundamentoRequisitos && $tramite->fundamentoRequisitos->count())
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->fundamentoRequisitos as $fundamentoRequsito)
                        <li>{{ $fundamentoRequsito->fundamento }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay fundametos registrados.</p>
            @endif

            <h2 class="text-lg font-bold">Inspección o Verificación</h2>
            <p>{{ $tramite->requiere_inspeccion == 1 ? 'Si' : 'No' }}</p>

            {{-- {{ $tramite->documentosFormatos }} --}}
            <h2 class="text-lg font-bold">FORMATOS Y DOCUMENTOS REQUERIDOS:</h2>
            @if ($tramite->documentosFormatos && $tramite->documentosFormatos->count())
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->documentosFormatos as $documento)
                        <li>
                            <a 
                                href="{{ $documento->ruta_archivo }}" 
                                target="_blank" 
                                class="text-blue-600 hover:underline"
                            >
                                {{ $documento->nombre_archivo }} - {{ $documento->tipo }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay formatos ni documentos registrados.</p>
            @endif
            
            <h2 class="text-lg font-bold">UNIDADES ADMINISTRATIVAS ANTE LAS QUE SE PUEDE PRESENTAR EL TRÁMITE O SOLICITAR EL SERVICIO</h2>
         @php
            $areas = [];
            
            foreach ($tramite->inmueblesTramite as $inmueble) {
            $areas[$inmueble->unidad_administrativa]['unidad'] = $inmueble->unidad_administrativa;
            $areas[$inmueble->unidad_administrativa]['inmueble'] = $inmueble->inmueble->nombre_inmueble ?? 'Sin nombre';
            $areas[$inmueble->unidad_administrativa]['piso'] = $inmueble->piso;
            }
            
            foreach ($tramite->horarios as $horario) {
            $areas[$horario->area]['horario'] = $horario->horario_atencion;
            }
            
            foreach ($tramite->telefonos as $telefono) {
            $areas[$telefono->area]['telefono'] = $telefono->numero;
            }
            
            foreach ($tramite->correos as $correo) {
            $areas[$correo->area]['correo'] = $correo->correo;
            }
            @endphp
            @if (!empty($areas))
            @foreach ($areas as $area => $datos)
            <div class="bg-gray-100 rounded-md overflow-hidden border border-gray-300 mb-6">
                <div class="p-4 border-b border-gray-300">
                    <strong>Área:</strong> {{ $area }}
                </div>
                @isset($datos['inmueble'])
                <div class="p-4 border-b border-gray-300">
                    <strong>Inmueble:</strong> {{ $datos['inmueble'] }}
                </div>
                @endisset
                @isset($datos['horario'])
                <div class="p-4 border-b border-gray-300">
                    <strong>Horario:</strong> {{ $datos['horario'] }}
                </div>
                @endisset
                @isset($datos['direccion'])
                <div class="p-4 border-b border-gray-300">
                    <strong>Dirección:</strong> {{ $datos['direccion'] }}
                </div>
                @endisset
                @isset($datos['piso'])
                <div class="p-4 border-b border-gray-300">
                    <strong>Piso:</strong> {{ $datos['piso'] }}
                </div>
                @endisset
                @isset($datos['correo'])
                <div class="p-4 border-b border-gray-300">
                    <strong>Correo Electrónico:</strong> {{ $datos['correo'] }}
                </div>
                @endisset
                @isset($datos['telefono'])
                <div class="p-4">
                    <strong>Tel:</strong> {{ $datos['telefono'] }}
                </div>
                @endisset
            </div>
            @endforeach
            
            @else
            <p class="text-gray-500">No hay datos registrados.</p>
            @endif

         

            <h2 class="text-lg font-bold mt-8">Sitios</h2>
            @if ($tramite->sitiosWeb && $tramite->sitiosWeb->count())
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->sitiosWeb as $sitio)
                        <li>
                            <a 
                                href="{{ $sitio->sitio }}" 
                                target="_blank" 
                                class="text-blue-600 hover:underline break-all"
                            >
                                {{ $sitio->sitio }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay sitios web registrados.</p>
            @endif

            <h2 class="text-lg font-bold mt-8">Objetivo de la inspección y verificación:</h2>
            <p>{{ $tramite->objetivo_inspeccion}}</p>

            <h2 class="text-lg font-bold mt-8">Fundamento jurídico de la inspección y verificación:</h2>
            <p>{{ $tramite->fundamento_inspeccion }}</p>
            <h2 class="text-lg font-bold mt-8">Información que deberá conservar para fines de acreditación , inspección y verificación con motivo del trámite o servicio:</h2>
            <p>{{ $tramite->informacion }}</p>
            <h2 class="text-lg font-bold mt-8">Demás información que se prevea en la estrategia:</h2>
            <p>{{ $tramite->demas_informacion }}</p>

        </div>

        <!-- Columna derecha (servicio) -->
        <div class="space-y-6">
            <h2 class="text-2xl font-bold">Servicio</h2>

            <div class="space-y-4">
                <div>
                    <strong>Nombre:</strong>
                    <p>{{ $tramite->nombre_tramite }}</p>
                </div>
            
                <div>
                    <strong>Tipo:</strong>
                    <p>{{ implode(', ', $tramite->tipo ?? []) }}</p>
                </div>
                
                <div>
                    <strong>Modalidad:</strong>
                    <p>{{ $tramite->modalidad }}</p>
                </div>
            
                <div>
                    <strong>¿Quién puede solicitarlo?:</strong>
                    <p>Público en general</p>
                </div>
            
                <div>
                    <strong>Tiempo de Plazo:</strong>
                    <p>{{ $tramite->plazo }}</p>
                </div>
            
                <div>
                    <strong>Fundamento Jurídico del plazo:</strong>
                    @if ($tramite->fundamentosPlazo && $tramite->fundamentosPlazo->count())
                        <ul class="list-decimal pl-5 space-y-2">
                            @foreach ($tramite->fundamentosPlazo as $fundamentoPalzo)
                                <li>
                                    {{ $fundamentoPalzo->fundamento }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No hay fundamentos registrados.</p>
                    @endif
                </div>
            
                <div>
                    <strong>Vigencia:</strong>
                    <p>{{ $tramite->vigencia }}</p>
                </div>
            
                <div>
                    <strong>Fundamento Jurídico de la Vigencia:</strong>
                    <p>{{ $tramite->fundamento_vigencia }}</p>
                </div>
            
                <div>
                    <strong>Monto:</strong>
                    @if ($tramite->montos && $tramite->montos->count())
                        <ul class="list-decimal pl-5 space-y-2">
                            @foreach ($tramite->montos as $monto)
                                <li>
                                    {{ $monto->monto }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No hay montos registrados.</p>
                    @endif
                </div>
            
                <div>
                    <strong>Fundamento jurídico del Monto:</strong>
                    <p>{{ $tramite->fundamento_monto }}</p>
                </div>
            
                <div>
                    <strong>Plazo con el que cuenta el sujeto obligado para prevenir al solicitante:</strong>
                    <p>{{ $tramite->plazo_solicitante }}</p>
                </div>
            
                <div>
                    <strong>Plazo con el que cuenta el solicitante para cumplir con la prevención:</strong>
                    <p>{{ $tramite->sujeto }}</p>
                </div>
            
                <div>
                    <strong>Criterios de resolución del trámite o servicio, en su caso:</strong>
                    <p>{{ $tramite->criterio }}</p>
                </div>

                <div>
                    <strong>Demas datos relativos a cualquier otro medio que pemita el envio de consulta, documentos y quejas</strong>
                    <p>{{ $tramite->demas_informacion }}</p>
                </div>
            </div>
            
        </div>

    </main>    
</div>
