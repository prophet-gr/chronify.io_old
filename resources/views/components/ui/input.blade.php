@props([
    'label' => null,
    'type' => 'text',
    'error' => null,
    'hint' => null,
])

<div>
    @if($label)
        <label for="{{ $attributes->get('id') }}" class="block text-sm font-medium text-surface-700 mb-1.5">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        {{ $attributes->merge([
            'class' => 'block w-full rounded-lg border px-3 py-2 text-sm shadow-sm placeholder:text-surface-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 disabled:bg-surface-50 disabled:text-surface-500 '
                . ($error ? 'border-danger-500 text-danger-700' : 'border-surface-300 text-surface-900'),
        ]) }}
        @if($error) aria-invalid="true" aria-describedby="{{ $attributes->get('id') }}-error" @endif
    />

    @if($error)
        <p class="mt-1.5 text-sm text-danger-600" id="{{ $attributes->get('id') }}-error" role="alert">{{ $error }}</p>
    @elseif($hint)
        <p class="mt-1.5 text-sm text-surface-500">{{ $hint }}</p>
    @endif
</div>
