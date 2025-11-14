@props([
    'variant' => 'primary',
    'type' => 'button',
    'fullWidth' => false
])

@php
$baseClasses = 'px-6 py-3 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 shadow-lg';

$variants = [
    'primary' => 'bg-blue-600 hover:bg-blue-700 text-white focus:ring-blue-300',
    'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-800 focus:ring-gray-300',
    'success' => 'bg-green-600 hover:bg-green-700 text-white focus:ring-green-300',
];

$widthClass = $fullWidth ? 'w-full' : '';
$classes = implode(' ', [$baseClasses, $variants[$variant] ?? $variants['primary'], $widthClass]);
@endphp

<button 
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</button>
