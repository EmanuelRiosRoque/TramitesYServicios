@props([
    'label' => '',
    'name' => null,
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
    'tooltip' => '',
])

@php
    $inputName = $name ?? $attributes->wire('model')->value();
    $errorKey = str_replace(['[', ']'], ['.', ''], $inputName);
    $hasXModel = $attributes->has('x-model') || $attributes->has('x-model.lazy') || $attributes->has('x-model.defer') || $attributes->has('x-model.live');
@endphp

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-800 mb-1">
            {{ $label }}
        </label>
    @endif

    @if ($tooltip)
        <span class="text-sm text-gray-600 block mb-1">{{ $tooltip }}</span>
    @endif

    <input
        type="{{ $type }}"
        @if ($name) name="{{ $name }}" id="{{ $name }}" @endif
        placeholder="{{ $placeholder ?: $label }}"
        @unless ($hasXModel)
            value="{{ old($name, $value) }}"
        @endunless
        {{ $attributes->merge([
            'class' => 'w-full rounded-md border ' .
                       ($errors->has($errorKey) ? 'border-red-500' : 'border-gray-200') .
                       ' bg-white p-3 text-sm text-gray-800 placeholder-gray-400 shadow-sm focus:border-teal-500 focus:ring-teal-500 transition duration-150 ease-in-out',
        ]) }}
    />

    @error($errorKey)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
