@props([
    'label' => '',
    'name',
    'options' => [],
    'selected' => old($name),
])

<div class="mb-4">
    @if ($label)
        <label class="block text-sm font-semibold mb-2">{{ $label }}</label>
    @endif
    <div class="flex items-center space-x-6">
        @foreach ($options as $value => $text)
            <label class="inline-flex items-center">
                <input 
                    type="radio" 
                    name="{{ $name }}" 
                    value="{{ $value }}"
                    {{ $selected == $value ? 'checked' : '' }}
                    {{ $attributes->whereStartsWith('x-model') }} 
                    class="form-radio text-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                >
                <span class="ml-2">{{ $text }}</span>
            </label>
        @endforeach
    </div>
</div>
