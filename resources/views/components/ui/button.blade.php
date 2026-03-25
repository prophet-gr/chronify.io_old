@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'type' => 'button',
    'disabled' => false,
])

@php
    $base = 'inline-flex items-center justify-center font-medium rounded-lg transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500 disabled:opacity-50 disabled:pointer-events-none';

    $variants = [
        'primary'   => 'bg-brand-600 text-white hover:bg-brand-700 active:bg-brand-800',
        'secondary' => 'bg-surface-100 text-surface-700 hover:bg-surface-200 active:bg-surface-300 border border-surface-300',
        'danger'    => 'bg-danger-600 text-white hover:bg-danger-700 active:bg-danger-700',
        'ghost'     => 'text-surface-600 hover:bg-surface-100 active:bg-surface-200',
        'success'   => 'bg-success-600 text-white hover:bg-success-700 active:bg-success-700',
    ];

    $sizes = [
        'sm' => 'text-sm px-3 py-1.5 gap-1.5',
        'md' => 'text-sm px-4 py-2 gap-2',
        'lg' => 'text-base px-5 py-2.5 gap-2',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled]) }}>
        {{ $slot }}
    </button>
@endif
