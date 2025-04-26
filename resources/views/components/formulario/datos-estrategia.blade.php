<div>
    <x-form.radiogroup 
        x-model=formData.tramiteEnLinea
        name="tramiteEnLinea"
        label="Es posible realizar el tramite o servicio completamente en linea sin acudir a oficinas gubernamentales?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.cargarDocumentos
        name="cargarDocumentos"
        label="Es posible cargar o subir documentos en linea?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.seguimiento
        name="seguimiento"
        label="Se puede dar seguimiento? Es decir, mostrar a los interesados el estatus en que se encuentra el tramite o servicio"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.informacionMedios
        name="informacionMedios"
        label="Se puede enviar y recibir informacion por medios electronicos con los correspondientes acuses de recepcion de datos y documentos"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.respuestaResolucion
        name="respuestaResolucion"
        label="La resolucion de la respuesta es por internet?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.utilizaFirma
        name="utilizaFirma"
        label="Utiliza firma electronica avanzada"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.realizarNotificaciones
        name="realizarNotificaciones"
        label="Es posible realizar notificaciones en linea por informacion faltante?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.input  x-model=formData.demasInformacion name="demasInformacion" label="Demas informacion que se preevea en la estartegia" placeholder="Ingrese informacion" />

    <input type="hidden" x-model="formData" wire:model.defer="formData">

    <div class="pt-4">
        <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-5 px-6 rounded shadow">
            Guardar Información
        </button>
    </div>

</div>