@props([
    'padding' => true,
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl border border-surface-200 shadow-card' . ($padding ? ' p-6' : '')]) }}>
    @isset($header)
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-surface-200">
            {{ $header }}
        </div>
    @endisset

    {{ $slot }}

    @isset($footer)
        <div class="pt-4 mt-4 border-t border-surface-200">
            {{ $footer }}
        </div>
    @endisset
</div>
