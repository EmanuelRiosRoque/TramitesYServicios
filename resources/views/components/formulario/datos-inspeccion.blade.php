<div class="space-y-4">

    <label class="block text-sm font-semibold mb-2">Inspeccion</label>
    

        <x-form.radiogroup 
            x-model=formData.requiereInspeccion
            name="requiereInspeccion"
            :options="[
                '1' => 'Si',
                '2' => 'No',
            ]"
        />

        <div x-show="formData.requiereInspeccion === '1'" x-transition>
            <x-form.input x-model="formData.objetivoInspeccion" name="objetivoInspeccion" label="Objetivo de la inspeccion y verificacion" placeholder="Ingrese objetivo" />
            <x-form.input x-model="formData.fundamentoInspeccion" name="fundamentoInspeccion" label="Fundamento Juridico de la inspeccion" placeholder="Ingrese fundamento" />
        </div>
    </div>