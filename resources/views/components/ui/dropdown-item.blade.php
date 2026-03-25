@props([
    'href' => null,
    'danger' => false,
])

@php
    $classes = 'block w-full text-left px-4 py-2 text-sm transition-colors '
        . ($danger
            ? 'text-danger-600 hover:bg-danger-50'
            : 'text-surface-700 hover:bg-surface-50');
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} role="menuitem">{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => $classes, 'type' => 'button']) }} role="menuitem">{{ $slot }}</button>
@endif
