@props([
    'name' => '',
    'maxWidth' => 'lg',
])

@php
    $widths = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
    ];
    $width = $widths[$maxWidth] ?? $widths['lg'];
@endphp

<div
    x-data="{ open: false }"
    x-on:open-modal.window="if ($event.detail === '{{ $name }}') open = true"
    x-on:close-modal.window="if ($event.detail === '{{ $name }}') open = false"
    x-on:keydown.escape.window="open = false"
    x-show="open"
    x-cloak
    class="fixed inset-0 z-50 overflow-y-auto"
    aria-labelledby="modal-{{ $name }}-title"
    role="dialog"
    aria-modal="true"
>
    <!-- Backdrop -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-surface-900/50"
        x-on:click="open = false"
        aria-hidden="true"
    ></div>

    <!-- Panel -->
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="w-full {{ $width }} bg-white rounded-xl shadow-modal overflow-hidden"
            x-on:click.stop
        >
            @isset($header)
                <div class="flex items-center justify-between px-6 py-4 border-b border-surface-200">
                    <h3 id="modal-{{ $name }}-title" class="text-lg font-semibold text-surface-900">{{ $header }}</h3>
                    <button x-on:click="open = false" class="text-surface-400 hover:text-surface-600 p-1 rounded-lg" aria-label="Close">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                    </button>
                </div>
            @endisset

            <div class="px-6 py-4">
                {{ $slot }}
            </div>

            @isset($footer)
                <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-surface-200 bg-surface-50">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>
