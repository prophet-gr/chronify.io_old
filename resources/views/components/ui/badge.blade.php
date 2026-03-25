@props([
    'variant' => 'default',
    'size' => 'sm',
])

@php
    $variants = [
        'default' => 'bg-surface-100 text-surface-700',
        'brand'   => 'bg-brand-100 text-brand-700',
        'success' => 'bg-success-50 text-success-700',
        'warning' => 'bg-warning-50 text-warning-700',
        'danger'  => 'bg-danger-50 text-danger-700',
    ];

    $sizes = [
        'sm' => 'text-xs px-2 py-0.5',
        'md' => 'text-sm px-2.5 py-0.5',
    ];

    $classes = 'inline-flex items-center font-medium rounded-full '
        . ($variants[$variant] ?? $variants['default']) . ' '
        . ($sizes[$size] ?? $sizes['sm']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
