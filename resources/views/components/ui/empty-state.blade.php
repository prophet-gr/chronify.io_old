@props([
    'title' => 'No items',
    'description' => null,
    'icon' => null,
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-12 text-center']) }}>
    @if($icon)
        <div class="mb-4 text-surface-300">
            {{ $icon }}
        </div>
    @endif

    <h3 class="text-sm font-medium text-surface-900">{{ $title }}</h3>

    @if($description)
        <p class="mt-1 text-sm text-surface-500">{{ $description }}</p>
    @endif

    @isset($action)
        <div class="mt-4">
            {{ $action }}
        </div>
    @endisset
</div>
