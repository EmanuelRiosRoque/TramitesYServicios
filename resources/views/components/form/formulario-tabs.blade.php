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
    </div>

    <div x-show="tab === 'formatos'" x-cloak>
       <x-formulario.datos-formatos />
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
            <x-form.input x-model=formData.vigencia name="vigencia" label="Vigencia de los avisos, permisos, licencias, autorizaciones, registros, demas resoluciones que se emitan" placeholder="Ingrese vegencia" />
            <x-form.input x-model=formData.fundamentoVigencia name="fundamentoVigencia" label="Fundamento Juridico Vigencia" placeholder="Ingrese fundamento" />
        </div>
    </div>

    <div x-show="tab === 'criterio'" x-cloak>
        <div>
            <x-form.input x-model=formData.criterio name="criterio" label="Criterios de la resolucion del tramite o servicio, en su caso" placeholder="Ingrese criterio" />
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
            <x-form.input x-model=formData.fundamentoInformacion name="fundamentoInformacion" label="Fundamento Juridico del la informacion" placeholder="Ingrese fundamento" />
        </div>
    </div>

    <div x-show="tab === 'estrategia'" x-cloak>
        <x-formulario.datos-estrategia />
    </div>                
</form>