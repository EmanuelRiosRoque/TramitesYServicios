<?php

namespace App\Livewire;

use App\Models\Paso;
use Livewire\Component;
use App\Models\Requisito;
use App\Models\MontoTramite;
use App\Models\CorreoTramite;
use App\Models\HorarioTramite;
use App\Models\FundamentoPlazo;
use App\Models\InmuebleTramite;
use App\Models\SitioWebTramite;
use App\Models\TelefonoTramite;
use App\Models\TramiteServicio;
use Livewire\Attributes\Layout;
use App\Models\CatalogoInmueble;
use App\Models\FundamentoRequisito;
use Illuminate\Support\Facades\Storage;
use App\Models\DocumentoFormatoRequerido;

#[Layout('layouts.app')]
class FormularioTramite extends Component
{
    public $documentosGuardados;
    public $fk_estatus;
    public $formatosGuardados;
    public $tab;
    public $formData = [
        // Datos generales del trámite
        'modalidad' => '',
        'fundamentoExtension' => '',
        'areaObligada' => '',
        'nombreTramite' => '',
        'descripcionTramite' => '',
        'tipo' => [],

        // Pasos para realizar el trámite
        'pasos' => [],

        // Requisitos
        'requisitos' => [],
        'fundamentos' => [],
        // Documentos
        'documentosRequeridos' => [],

        // Formato requerido
        'formatosRequeridos' => [],
        'formatoRequerido' => null,
        'fundamentoFormato' => '',
        'tipoFormato' => null,
        'otroFormato' => '',

        // Inspeccion verificacion
        'requiereInspeccion' => null,
        'objetivoInspeccion' => '',
        'fundamentoInspeccion' => '',

        // Plazo
        'plazo' => '',
        'plazoSujeto' => '',
        'plazoSolicitante' => '',
        'fundamentosPlazo' => [],

        // Monto
        'montos' => [],
        'fundamentoMonto' => '',

        // Vigencia
        'vigencia' => '',
        'fundamentoVigencia' => '',

        // Criterio
        'criterio' => '',
        'fundamentoCriterio' => '',

        // Unidad
        'domicilios' => [],
        'horarios' => [],

        // otros Medios
        'telefonos' => [],
        'correos' => [],
        'sitiosWebs' => [],
        'demasDatosRelativos' => '',

        //Informacion
        'informacion' => '',
        'fundamentoInformacion' => '',

        //Demas informacion
        'tramiteEnLinea' => null,   // ← null
        'cargarDocumentos' => null, // ← null
        'seguimiento' => null,      // ← null
        'informacionMedios' => null, // ← null
        'respuestaResolucion' => null, // ← null
        'utilizaFirma' => null,     // ← null
        'realizarNotificaciones' => null, // ← null
        'demasInformacion' => '',

    ];
    public $tramiteServicioId;


    public function mount($id)
    {
        if ($id) {
            $tramite = TramiteServicio::with(
                'pasos',
                'requisitos',
                'fundamentoRequisitos',
                'documentosFormatos',
                'montos',
                'inmueblesTramite',
                'horarios',
                'telefonos',
                'correos',
                'sitiosWeb',
                'fundamentosPlazo'
            )->find($id);
    
            if ($tramite) {
                $this->tramiteServicioId = $id;
                $this->fk_estatus = $tramite->fk_estatus;
                // 🔥 Solo si existen documentos
                $this->documentosGuardados = $tramite->documentosFormatos
                    ? $tramite->documentosFormatos->map(function ($doc) {
                        return [
                            'id' => $doc->id,
                            'name' => $doc->nombre_archivo,
                            'type' => $doc->tipo_archivo,
                            'size' => $doc->tamano_archivo,
                            'tipo' => $doc->tipo,
                            'ruta' => $doc->ruta_archivo,
                        ];
                    })->toArray()
                    : [];
    
                // 🔥 Cargamos todos los datos al formData
                $this->formData = array_merge($this->formData, [
                    'modalidad' => $tramite->modalidad,
                    'areaObligada' => $tramite->fk_areasObligada,
                    'nombreTramite' => $tramite->nombre_tramite,
                    'descripcionTramite' => $tramite->descripcion,
                    'tipo' => $tramite->tipo,
                    'fundamentoExtension' => $tramite->fundamento_existencia,
                    // Formato
                    'formatoRequerido' => $tramite->formato_requerido,
                    'tipoFormato' => $tramite->tipo_formato,
                    'otroFormato' => $tramite->otro_formato,
                    'fundamentoFormato' => $tramite->fundamento_formato,
    
                    // Inspección
                    'requiereInspeccion' => $tramite->requiere_inspeccion,
                    'objetivoInspeccion' => $tramite->objetivo_inspeccion,
                    'fundamentoInspeccion' => $tramite->fundamento_inspeccion,
    
                    // Plazo
                    'plazo' => $tramite->plazo,
                    'plazoSujeto' => $tramite->plazo_sujeto,
                    'plazoSolicitante' => $tramite->plazo_solicitante,
    
                    // Monto
                    'fundamentoMonto' => $tramite->fundamento_monto,
    
                    // Vigencia
                    'vigencia' => $tramite->vigencia,
                    'fundamentoVigencia' => $tramite->fundamento_vigencia,
    
                    // Criterio
                    'criterio' => $tramite->criterio,
                    'fundamentoCriterio' => $tramite->fundamento_criterio,
    
                    // Demás datos
                    'demasDatosRelativos' => $tramite->demas_datos_relativos,
    
                    // Información
                    'informacion' => $tramite->informacion,
                    'fundamentoInformacion' => $tramite->fundamento_informacion,
    
                    // Demás información
                    'tramiteEnLinea' => $tramite->tramite_en_linea,
                    'cargarDocumentos' => $tramite->cargar_documentos,
                    'seguimiento' => $tramite->seguimiento,
                    'informacionMedios' => $tramite->informacion_medios,
                    'respuestaResolucion' => $tramite->respuesta_resolucion,
                    'utilizaFirma' => $tramite->utiliza_firma,
                    'realizarNotificaciones' => $tramite->realizar_notificaciones,
                    'demasInformacion' => $tramite->demas_nformacion,
    
                    // Relaciones hijas
                    'pasos' => $tramite->pasos ? $tramite->pasos->pluck('paso')->toArray() : [],
                    'requisitos' => $tramite->requisitos ? $tramite->requisitos->pluck('requisito')->toArray() : [],
                    'fundamentos' => $tramite->fundamentoRequisitos ? $tramite->fundamentoRequisitos->pluck('fundamento')->toArray() : [],
                    'montos' => $tramite->montos ? $tramite->montos->pluck('monto')->toArray() : [],
                    'domicilios' => $tramite->inmueblesTramite
                        ? $tramite->inmueblesTramite->map(function ($inmueble) {
                            $catalogo = CatalogoInmueble::find($inmueble->id_inmueble);
                            return [
                                'id_inmueble' => $inmueble->id_inmueble,
                                'nombre_inmueble' => $catalogo ? $catalogo->nombre_inmueble : 'Desconocido',
                                'piso' => $inmueble->piso,
                                'unidad' => $inmueble->unidad_administrativa,
                            ];
                        })->toArray()
                        : [],
                    'horarios' => $tramite->horarios
                        ? $tramite->horarios->map(function ($horario) {
                            return [
                                'horario' => $horario->horario_atencion,
                                'area' => $horario->area,
                            ];
                        })->toArray()
                        : [],
                    'telefonos' => $tramite->telefonos
                        ? $tramite->telefonos->map(function ($telefono) {
                            return [
                                'telefono' => $telefono->numero,
                                'area' => $telefono->area,
                            ];
                        })->toArray()
                        : [],
                    'correos' => $tramite->correos
                        ? $tramite->correos->map(function ($correo) {
                            return [
                                'correo' => $correo->correo,
                                'area' => $correo->area,
                            ];
                        })->toArray()
                        : [],
                    'sitiosWebs' => $tramite->sitiosWeb
                        ? $tramite->sitiosWeb->pluck('sitio')->toArray()
                        : [],

                    'fundamentosPlazo' => $tramite->fundamentosPlazo
                        ? $tramite->fundamentosPlazo->pluck('fundamento')->toArray()
                        : [],
                ]);
            }
        }
    }
    

    public function submit()
    {
        $tramite = TramiteServicio::find($this->tramiteServicioId);

        if ($tramite) {
            // Actualizamos los datos principales
            $tramite->update([
                'modalidad' => $this->formData['modalidad'],
                'fk_areasObligada' => $this->nullIfEmpty($this->formData['areaObligada']),
                'nombre_tramite' => $this->formData['nombreTramite'],
                'descripcion' => $this->formData['descripcionTramite'],
                'tipo' => $this->formData['tipo'] ?? [],
                'fundamento_existencia' => $this->formData['fundamentoExtension'],
                // Formato
                'formato_requerido' => $this->nullIfEmpty($this->formData['formatoRequerido']),
                'tipo_formato' => $this->nullIfEmpty($this->formData['tipoFormato']),
                'otro_formato' => $this->nullIfEmpty($this->formData['otroFormato']),
                'fundamento_formato' => $this->nullIfEmpty($this->formData['fundamentoFormato']),

                // Inspección
                'requiere_inspeccion' => $this->nullIfEmpty($this->formData['requiereInspeccion']),
                'objetivo_inspeccion' => $this->nullIfEmpty($this->formData['objetivoInspeccion']),
                'fundamento_inspeccion' => $this->nullIfEmpty($this->formData['fundamentoInspeccion']),

                // Plazo
                'plazo' => $this->nullIfEmpty($this->formData['plazo']),
                'plazo_sujeto' => $this->nullIfEmpty($this->formData['plazoSujeto']),
                'plazo_solicitante' => $this->nullIfEmpty($this->formData['plazoSolicitante']),

                // Monto
                'fundamento_monto' => $this->nullIfEmpty($this->formData['fundamentoMonto']),

                // Vigencia
                'vigencia' => $this->nullIfEmpty($this->formData['vigencia']),
                'fundamento_vigencia' => $this->nullIfEmpty($this->formData['fundamentoVigencia']),

                // Criterio
                'criterio' => $this->nullIfEmpty($this->formData['criterio']),
                'fundamento_criterio' => $this->nullIfEmpty($this->formData['fundamentoCriterio']),

                // Demás datos
                'demas_datos_relativos' => $this->nullIfEmpty($this->formData['demasDatosRelativos']),

                // Información
                'informacion' => $this->nullIfEmpty($this->formData['informacion']),
                'fundamento_informacion' => $this->nullIfEmpty($this->formData['fundamentoInformacion']),

                'tramite_en_linea' => $this->nullIfEmpty($this->formData['tramiteEnLinea']),
                'cargar_documentos' => $this->nullIfEmpty($this->formData['cargarDocumentos']),
                'seguimiento' => $this->nullIfEmpty($this->formData['seguimiento']),
                'informacion_medios' => $this->nullIfEmpty($this->formData['informacionMedios']),
                'respuesta_resolucion' => $this->nullIfEmpty($this->formData['respuestaResolucion']),
                'utiliza_firma' => $this->nullIfEmpty($this->formData['utilizaFirma']),
                'realizar_notificaciones' => $this->nullIfEmpty($this->formData['realizarNotificaciones']),
                'demas_nformacion' => $this->nullIfEmpty($this->formData['demasInformacion']),
            ]);


            Paso::where('tramite_servicio_id', $this->tramiteServicioId)->delete();

            if (!empty($this->formData['pasos'])) {
                foreach ($this->formData['pasos'] as $paso) {
                    if (trim($paso) !== '') {
                        $tramite->pasos()->create([
                            'paso' => $paso,
                        ]);
                    }
                }
            }

            //Primero, eliminar los requisitos anteriores de este trámite
            Requisito::where('tramite_servicio_id', $this->tramiteServicioId)->delete();
            //Insertar nuevos requisitos
            if (!empty($this->formData['requisitos']) && is_array($this->formData['requisitos'])) {
                foreach ($this->formData['requisitos'] as $requisito) {
                    if (trim($requisito) !== '') {
                        Requisito::create([
                            'tramite_servicio_id' => $this->tramiteServicioId,
                            'requisito' => $requisito,
                        ]);
                    }
                }
            }

            //Primero, eliminar los fundamentos jurídicos anteriores del trámite
            FundamentoRequisito::where('tramite_servicio_id', $this->tramiteServicioId)->delete();
            //Insertar nuevos fundamentos jurídicos
            if (!empty($this->formData['fundamentos']) && is_array($this->formData['fundamentos'])) {
                foreach ($this->formData['fundamentos'] as $fundamento) {
                    if (trim($fundamento) !== '') {
                        FundamentoRequisito::create([
                            'tramite_servicio_id' => $this->tramiteServicioId,
                            'fundamento' => $fundamento,
                        ]);
                    }
                }
            }

            // Insertar nuevos documentos/formatos
            if (!empty($this->formData['documentosRequeridos']) && is_array($this->formData['documentosRequeridos'])) {
                foreach ($this->formData['documentosRequeridos'] as $documento) {
                    if (!empty($documento['base64'])) {
                        $nombreArchivo = time() . '_' . $documento['name'];
                        $ruta = 'documentos/' . $nombreArchivo; // Guardarlo en /storage/app/public/documentos

                        // 🔥 Guardamos el archivo físico en el servidor
                        Storage::disk('public')->put($ruta, base64_decode($documento['base64']));

                        // 🔥 Creamos el registro en la base de datos
                        DocumentoFormatoRequerido::create([
                            'tramite_servicio_id' => $this->tramiteServicioId,
                            'nombre_archivo' => $documento['name'],
                            'tipo_archivo' => $documento['type'],
                            'tamano_archivo' => $documento['size'],
                            'tipo' => 'documento', // Importante: se marca como documento
                            'ruta_archivo' => $ruta,
                        ]);
                    }
                }
            }
            if (!empty($this->formData['formatosRequeridos']) && is_array($this->formData['formatosRequeridos'])) {
                foreach ($this->formData['formatosRequeridos'] as $formato) {
                    if (!empty($formato['base64'])) {
                        $nombreArchivo = time() . '_' . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $formato['name']);
                        $ruta = 'documentos/' . $nombreArchivo; // Guardarlo en /storage/app/public/documentos (igual que documentos)
            
                        // 🔥 Guardamos el archivo físico en el servidor
                        Storage::disk('public')->put($ruta, base64_decode($formato['base64']));
            
                        // 🔥 Creamos el registro en la base de datos
                        DocumentoFormatoRequerido::create([
                            'tramite_servicio_id' => $this->tramiteServicioId,
                            'nombre_archivo' => $formato['name'],
                            'tipo_archivo' => $formato['type'],
                            'tamano_archivo' => $formato['size'],
                            'tipo' => 'formato', // 🔥 Aquí sí ponemos 'formato'
                            'ruta_archivo' => $ruta,
                        ]);
                    }
                }
            }
            

            // Primero eliminamos los montos anteriores
            MontoTramite::where('tramite_servicio_id', $this->tramiteServicioId)->delete();

            // Insertar nuevos montos
            if (!empty($this->formData['montos']) && is_array($this->formData['montos'])) {
                foreach ($this->formData['montos'] as $monto) {
                    if (trim($monto) !== '') {
                        MontoTramite::create([
                            'tramite_servicio_id' => $this->tramiteServicioId,
                            'monto' => $monto,
                        ]);
                    }
                }
            }

            // Primero eliminamos los inmuebles anteriores
            // InmuebleTramite::where('tramite_servicio_id', $this->tramiteServicioId)->delete();

            // Insertar nuevos inmuebles
            InmuebleTramite::where('tramite_servicio_id', $this->tramiteServicioId)->delete();

            if (!empty($this->formData['domicilios']) && is_array($this->formData['domicilios'])) {
                foreach ($this->formData['domicilios'] as $inmueble) {
                    InmuebleTramite::create([
                        'tramite_servicio_id' => $this->tramiteServicioId,
                        'id_inmueble' => $inmueble['id_inmueble'],
                        'piso' => $inmueble['piso'],
                        'unidad_administrativa' => $inmueble['unidad'],
                    ]);
                }
            }
            

            TelefonoTramite::where('tramite_servicio_id', $this->tramiteServicioId)->delete();

            // Insertar nuevos teléfonos
            if (!empty($this->formData['telefonos']) && is_array($this->formData['telefonos'])) {
                foreach ($this->formData['telefonos'] as $telefono) {
                    if (!empty($telefono['telefono']) || !empty($telefono['area'])) {
                        TelefonoTramite::create([
                            'tramite_servicio_id' => $this->tramiteServicioId,
                            'numero' => $telefono['telefono'],
                            'area' => $telefono['area'],
                        ]);
                    }
                }
            }


            // Primero eliminamos los correos anteriores
            CorreoTramite::where('tramite_servicio_id', $this->tramiteServicioId)->delete();

            // Insertar nuevos correos
            if (!empty($this->formData['correos']) && is_array($this->formData['correos'])) {
                foreach ($this->formData['correos'] as $correo) {
                    if (!empty($correo['correo']) || !empty($correo['area'])) {
                        CorreoTramite::create([
                            'tramite_servicio_id' => $this->tramiteServicioId,
                            'correo' => $correo['correo'],
                            'area' => $correo['area'],
                        ]);
                    }
                }
            }


            SitioWebTramite::where('tramite_servicio_id', $this->tramiteServicioId)->delete();

            // Insertar nuevos sitios web
            if (!empty($this->formData['sitiosWebs']) && is_array($this->formData['sitiosWebs'])) {
                foreach ($this->formData['sitiosWebs'] as $sitio) {
                    if (!empty($sitio)) {
                        SitioWebTramite::create([
                            'tramite_servicio_id' => $this->tramiteServicioId,
                            'sitio' => $sitio,
                        ]);
                    }
                }
            }

            HorarioTramite::where('tramite_servicio_id', $this->tramiteServicioId)->delete();

            // Insertar nuevos horarios
            if (!empty($this->formData['horarios']) && is_array($this->formData['horarios'])) {
                foreach ($this->formData['horarios'] as $horario) {
                    if (!empty($horario['horario']) || !empty($horario['area'])) {
                        HorarioTramite::create([
                            'tramite_servicio_id' => $this->tramiteServicioId,
                            'horario_atencion' => $horario['horario'],
                            'area' => $horario['area'],
                        ]);
                    }
                }
            }

            FundamentoPlazo::where('tramite_servicio_id', $this->tramiteServicioId)->delete();

        // Insertar nuevos fundamentos de plazo
        if (!empty($this->formData['fundamentosPlazo']) && is_array($this->formData['fundamentosPlazo'])) {
            foreach ($this->formData['fundamentosPlazo'] as $fundamento) {
                if (!empty($fundamento)) {
                    FundamentoPlazo::create([
                        'tramite_servicio_id' => $this->tramiteServicioId,
                        'fundamento' => $fundamento,
                    ]);
                }
            }
        }


        } else {
            dd('❌ Trámite no encontrado');
        }
    }

    private function nullIfEmpty($valor)
    {
        return $valor !== '' ? $valor : null;
    }

    public function eliminarDocumentoExistente($id)
    {
        $documento = DocumentoFormatoRequerido::find($id);

        if ($documento) {
            // 🔥 Borra el archivo físico en storage
            if (Storage::disk('public')->exists($documento->ruta_archivo)) {
                Storage::disk('public')->delete($documento->ruta_archivo);
            }

            // 🔥 Borra el registro de la base de datos
            $documento->delete();

            // 🔥 Vuelve a actualizar la lista de documentosGuardados
            $this->actualizarDocumentosGuardados();
        }
    }

    public function actualizarDocumentosGuardados()
    {
        $tramite = TramiteServicio::with('documentosFormatos')->find($this->tramiteServicioId);

        $this->documentosGuardados = $tramite->documentosFormatos
            ->map(function ($doc) {
                return [
                    'id' => $doc->id,
                    'name' => $doc->nombre_archivo,
                    'type' => $doc->tipo_archivo,
                    'size' => $doc->tamano_archivo,
                    'tipo' => $doc->tipo, // documento, formato, etc
                    'ruta' => $doc->ruta_archivo,
                ];
            })->toArray();
    }

public function enviarRevision()
{
    $tramite = TramiteServicio::find($this->tramiteServicioId);

    if ($tramite) {
        $tramite->update([
            'fk_estatus' => 2, // Cambiar a "En Revisión"
        ]);

        // 🔥 Actualizar el valor local para que desaparezcan los botones
        $this->fk_estatus = 2;
    }
}

    public function render()
    {
        return view('livewire.formulario-tramite');
    }
}
