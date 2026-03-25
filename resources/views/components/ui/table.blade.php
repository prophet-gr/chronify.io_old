@props([
    'striped' => false,
])

<div {{ $attributes->merge(['class' => 'overflow-x-auto rounded-xl border border-surface-200']) }}>
    <table class="min-w-full divide-y divide-surface-200" role="table">
        @isset($head)
            <thead class="bg-surface-50">
                <tr>
                    {{ $head }}
                </tr>
            </thead>
        @endisset

        <tbody class="divide-y divide-surface-200 bg-white {{ $striped ? '[&>tr:nth-child(even)]:bg-surface-50' : '' }}">
            {{ $slot }}
        </tbody>
    </table>
</div>
