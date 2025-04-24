@props([
    'label' => '',
    'name',
    'options' => [],
    'placeholder' => 'Selecciona una opción',
    'value' => '',
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-800 mb-1">{{ $label }}</label>
    @endif

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-md border border-gray-200 bg-white p-3 text-sm text-gray-800 shadow-sm focus:border-teal-500 focus:ring-teal-500 transition duration-150 ease-in-out',
        ]) }}
    >
        <option disabled {{ $value == '' ? 'selected' : '' }}>{{ $placeholder }}</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" {{ $key == old($name, $value) ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>
