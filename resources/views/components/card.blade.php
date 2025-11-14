@props([
    'selectable' => false,
    'selected' => false
])

@php
$baseClasses = 'bg-white rounded-xl shadow-md p-6 transition-all duration-300';

if ($selectable) {
    $baseClasses .= ' cursor-pointer hover:shadow-xl hover:scale-105 border-2';
    $baseClasses .= $selected ? ' border-blue-600 bg-blue-50' : ' border-gray-200 hover:border-blue-300';
} else {
    $baseClasses .= ' border border-gray-200';
}
@endphp

<div {{ $attributes->merge(['class' => $baseClasses]) }}>
    {{ $slot }}
</div>
