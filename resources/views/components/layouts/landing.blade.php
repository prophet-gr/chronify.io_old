@props([
    'title' => 'Chronify — Time Tracking for Teams & Freelancers',
    'description' => 'Powerful cloud-based time tracking platform. Track hours, manage projects, and generate reports with precision and ease.',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description }}">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-white text-surface-900 font-sans antialiased">
    {{ $slot }}
</body>
</html>
