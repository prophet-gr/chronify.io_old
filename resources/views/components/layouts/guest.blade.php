@props([
    'title' => 'Chronify',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - Chronify</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-surface-50 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="flex justify-center mb-8">
            <a href="/" class="flex items-center gap-3">
                <svg class="w-10 h-10 text-brand-600" fill="none" viewBox="0 0 32 32" stroke="currentColor" stroke-width="2">
                    <circle cx="16" cy="16" r="13" />
                    <path d="M16 8v8l5.5 3.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="text-2xl font-bold text-surface-900">Chronify</span>
            </a>
        </div>

        {{ $slot }}
    </div>
</body>
</html>
