@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'error' => '',
    'required' => false,
    'readonly' => false
])

<div class="mb-4">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-2">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $readonly ? 'readonly' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors ' . 
                       ($error ? 'border-red-500' : 'border-gray-300') . 
                       ($readonly ? ' bg-gray-100 cursor-not-allowed' : '')
        ]) }}
    >
    
    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>
