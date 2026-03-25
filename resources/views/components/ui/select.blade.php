@props([
    'label' => null,
    'error' => null,
])

<div>
    @if($label)
        <label for="{{ $attributes->get('id') }}" class="block text-sm font-medium text-surface-700 mb-1.5">
            {{ $label }}
        </label>
    @endif

    <select
        {{ $attributes->merge([
            'class' => 'block w-full rounded-lg border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 disabled:bg-surface-50 disabled:text-surface-500 '
                . ($error ? 'border-danger-500' : 'border-surface-300 text-surface-900'),
        ]) }}
        @if($error) aria-invalid="true" @endif
    >
        {{ $slot }}
    </select>

    @if($error)
        <p class="mt-1.5 text-sm text-danger-600" role="alert">{{ $error }}</p>
    @endif
</div>
