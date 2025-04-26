<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TramiteServicio;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class FormularioTramite extends Component
{

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
        'requsitos' => [],
        'fundamentos' => [],
        // Documentos
        'documentosRequeridos' => [],

        // Formato requerido
        'formatosRequeridos' => [],
        'formatoRequerido' => '',
        'fundamentoFormato' => '',
        'tipoFormato' => '',
        'otroFormato' => '',

        // Inspeccion verificacion
        'requiereInspeccion' => '',
        'objetivoInspeccion' => '',
        'fundamentoInspeccion' => '',

        // Plazo
        'plazo' => '',
        'plazoSujeto' => '',
        'plazoSolicitante' => '',
        'fundamentosPlazo' => [],

        // Monto
        'montos' =>[],
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
        'sitiosWebs' => [],

        // otros Medios
        'telefonos' => [],
        'correos' => [],
        'demasDatosRelativos' => '',

        //Informacion
        'informacion' => '',
        'fundamentoInformacion' => '',

        //Demas informacion
        'tramiteEnLinea' => '',
        'cargarDocumentos' => '',
        'seguimiento' => '',
        'informacionMedios' => '',
        'respuestaResolucion' => '',
        'utilizaFirma' => '',
        'realizarNotificaciones' => '',
        'demasInformacion' => '',
      
    ];

    // public $formData = [
    //     // Datos generales del trámite
    //     'modalidad' => 'Presencial',
    //     'fundamentoExtension' => 'Artículo 15 de la Ley de Procedimientos',
    //     'areaObligada' => 'Dirección Jurídica',
    //     'nombreTramite' => 'Solicitud de constancia de antecedentes',
    //     'descripcionTramite' => 'Trámite para obtener constancia de no antecedentes penales.',
    //     'tipo' => ['servicio'],
    
    //     // Pasos para realizar el trámite
    //     'pasos' => [
    //         'Llenar el formulario de solicitud.',
    //         'Entregar documentación requerida.',
    //         'Esperar resolución de la autoridad.'
    //     ],
    
    //     // Requisitos
    //     'requisitos' => [
    //         'Identificación oficial vigente.',
    //         'Comprobante de domicilio reciente.'
    //     ],
    //     'fundamentos' => [
    //         'Artículo 22 de la Ley de Transparencia',
    //         'Reglamento interno del área solicitante'
    //     ],
    
    //     // Documentos
    //     'documentosRequeridos' => [
    //         'Formato de solicitud firmado.',
    //         'Copia simple de identificación oficial.'
    //     ],
    
    //     // Formato requerido
    //     'formatosRequeridos' => ['1'],

    //     'formatoRequerido' => '1',
    //     'fundamentoFormato' => 'Artículo 34 del Reglamento',
    //     'tipoFormato' => '4',
    //     'otroFormato' => 'Si',
    //     // Inspección/verificación
    //     'requiereInspeccion' => '2',
    //     'objetivoInspeccion' => '',
    //     'fundamentoInspeccion' => '',
    
    //     // Plazo
    //     'plazo' => '15 días hábiles',
    //     'plazoSujeto' => 'Sujeto a disponibilidad',
    //     'plazoSolicitante' => 'Debe presentarse dentro de los 10 días posteriores.',
    //     'fundamentosPlazo' => [
    //         'Artículo 14 del Código Administrativo.'
    //     ],
    
    //     // Monto
    //     'montos' => [
    //         '350.00',
    //         '500.00'
    //     ],
    //     'fundamentoMonto' => 'Artículo 10 de la Ley de Derechos',
    
    //     // Vigencia
    //     'vigencia' => '1 año',
    //     'fundamentoVigencia' => 'Artículo 25 del Reglamento Interno',
    
    //     // Criterio
    //     'criterio' => 'Otorgamiento condicionado a validación de datos.',
    //     'fundamentoCriterio' => 'Artículo 40 de la Ley General',
    
    //     // Unidad (Domicilios y Horarios)
    //     'domicilios' => [
    //         [
    //             'calle' => 'Inmueble Torre Norte',
    //             'piso' => '5',
    //             'unidad' => 'Dirección Jurídica'
    //         ],
    //         [
    //             'calle' => 'Inmueble Dr. Lavista',
    //             'piso' => '3',
    //             'unidad' => 'Departamento de Archivo'
    //         ]
    //     ],
    //     'horarios' => [
    //         [
    //             'horario' => '9:00 a.m. - 3:00 p.m.',
    //             'area' => 'Atención al público'
    //         ],
    //         [
    //             'horario' => '10:00 a.m. - 2:00 p.m.',
    //             'area' => 'Archivo'
    //         ]
    //     ],
    //     'sitiosWebs' => [
    //         'https://tramites.ejemplo.gob.mx',
    //         'https://consultas.ejemplo.gob.mx'
    //     ],
    
    //     // Otros medios de contacto
    //     'telefonos' => [
    //         [
    //             'telefono' => '55 1234 5678',
    //             'area' => 'Atención al Público'
    //         ],
    //         [
    //             'telefono' => '55 8765 4321',
    //             'area' => 'Archivo General'
    //         ]
    //     ],

    //     'correos' => [
    //         [
    //             'correo' => 'atencion@ejemplo.gob.mx',
    //             'area' => 'Atención al Público'
    //         ],
    //         [
    //             'correo' => 'archivo@ejemplo.gob.mx',
    //             'area' => 'Departamento de Archivo'
    //         ]
    //     ],

    //     'demasDatosRelativos' => 'Citas únicamente por internet.',
    
    //     // Información complementaria
    //     'informacion' => 'Información adicional disponible en la página web oficial.',
    //     'fundamentoInformacion' => 'Artículo 50 de la Ley de Gobierno Digital',
    
    //     // Demás información sobre trámites
    //     'tramiteEnLinea' => '1',
    //     'cargarDocumentos' => '2',
    //     'seguimiento' => '1',
    //     'informacionMedios' => '2',
    //     'respuestaResolucion' => '1',
    //     'utilizaFirma' => '2',
    //     'realizarNotificaciones' => '1',
    //     'demasInformacion' => 'En caso de dudas comunicarse al teléfono institucional.'
    // ];
    public function mount($id)
    {
        if ($id) {
            $tramite = TramiteServicio::find($id);
            // dd($tramite);
            $this->formData = [
                'nombreTramite' => $tramite->nombre_tramite_servicio,
                'descripcionTramite' => $tramite->descripcion_tramite_servicio,
                'tipo' => $tramite->tipo, 
                'formatoRequerido' => $tramite->formato_requerido,
            ];
        }
    }

    public function rules()
    {
        return [
            'formData.modalidad' => 'required|string',
        ];
    }

    public function submit()
    {
        // $this->validate(); // ✅ Esto usa automáticamente el método rules()
        // Por ejemplo:
        dd('Formulario válido', $this->formData);
    }
    public function render()
    {
        return view('livewire.formulario-tramite');
    }
}
