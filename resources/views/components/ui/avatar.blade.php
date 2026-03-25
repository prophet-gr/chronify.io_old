@props([
    'name' => '',
    'src' => null,
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => 'w-7 h-7 text-xs',
        'md' => 'w-9 h-9 text-sm',
        'lg' => 'w-12 h-12 text-base',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $initials = collect(explode(' ', $name))->map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)))->take(2)->join('');
@endphp

@if($src)
    <img src="{{ $src }}" alt="{{ $name }}" {{ $attributes->merge(['class' => "$sizeClass rounded-full object-cover"]) }} />
@else
    <span {{ $attributes->merge(['class' => "$sizeClass rounded-full bg-brand-100 text-brand-700 font-medium inline-flex items-center justify-center"]) }} aria-label="{{ $name }}">
        {{ $initials }}
    </span>
@endif
