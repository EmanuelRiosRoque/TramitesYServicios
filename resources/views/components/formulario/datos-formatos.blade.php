<div>
    <!-- Radios -->
    <label class="block text-sm font-semibold mb-2">Formato Requerido</label>
    <div class="flex items-center space-x-6">
        <label class="inline-flex items-center">
            <input 
                type="radio" 
                name="formatoRequerido" 
                value="1" 
                class="form-radio text-teal-600"
                x-model="formData.formatoRequerido"
            >
            <span class="ml-2">Sí</span>
        </label>
        <label class="inline-flex items-center">
            <input 
                type="radio" 
                name="formatoRequerido" 
                value="2" 
                class="form-radio text-teal-600"
                x-model="formData.formatoRequerido"
            >
            <span class="ml-2">No</span>
        </label>
    </div>

    <!-- Dropzone visible solo si se selecciona "Sí" -->
    <div x-show="formData.formatoRequerido == '1'" x-transition>
        

        <x-form.radiogroup 
            x-model=formData.tipoFormato
            name="tipoFormato"
            :options="[
                '1' => 'Ejemplo 1',
                '2' => 'Ejemplo 2',
                '3' => 'Ejemplo 3',
                '4' => 'Otro ',
            ]"
        />
        <div x-show="formData.tipoFormato === '4'" x-transition>
            <x-form.input 
                x-model="formData.otroFormato" 
                name="otroFormato" 
                label="No se sabe" 
                placeholder="Ingrese que otro" 
            />
        </div>

        <x-form.dropzone 
            name="formatosRequeridos"
            label="Formatos requeridos para el trámite o servicio"
            accept="application/pdf"
            multiple
            x-model="formData.formatosRequeridos"
        />
    </div>

    <!-- Input para Fundamento -->
    <x-form.input 
        x-model="formData.fundamentoFormato" 
        name="fundamentoFormato" 
        label="Fundamento Jurídico Formato" 
        placeholder="Ingrese fundamento" 
    />

</div>