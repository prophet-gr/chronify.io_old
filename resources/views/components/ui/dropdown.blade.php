@props([
    'align' => 'right',
])

@php
    $alignClass = $align === 'left' ? 'left-0' : 'right-0';
@endphp

<div x-data="{ open: false }" class="relative" {{ $attributes }}>
    <div x-on:click="open = !open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-on:click.outside="open = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute {{ $alignClass }} z-40 mt-2 w-48 rounded-lg bg-white border border-surface-200 shadow-dropdown py-1"
        role="menu"
        x-cloak
    >
        {{ $slot }}
    </div>
</div>
