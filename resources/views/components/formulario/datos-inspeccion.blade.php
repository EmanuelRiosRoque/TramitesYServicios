<div class="space-y-4">

    <label class="block text-sm font-semibold mb-2">Inspeccion</label>
        <div class="flex items-center space-x-6">
            <label class="inline-flex items-center">
                <input 
                    type="radio" 
                    name="requiereInspeccion" 
                    value="1" 
                    class="form-radio text-teal-600"
                    x-model="formData.requiereInspeccion"
                >
                <span class="ml-2">Sí</span>
            </label>
            <label class="inline-flex items-center">
                <input 
                    type="radio" 
                    name="requiereInspeccion" 
                    value="2" 
                    class="form-radio text-teal-600"
                    x-model="formData.requiereInspeccion"
                >
                <span class="ml-2">No</span>
            </label>
        </div>

        <div x-show="formData.requiereInspeccion === '1'" x-transition>
            <x-form.input x-model="formData.objetivoInspeccion" name="objetivoInspeccion" label="Objetivo de la inspeccion y verificacion" placeholder="Ingrese objetivo" />
            <x-form.input x-model="formData.fundamentoInspeccion" name="fundamentoInspeccion" label="Fundamento Juridico de la inspeccion" placeholder="Ingrese fundamento" />
        </div>
    </div>