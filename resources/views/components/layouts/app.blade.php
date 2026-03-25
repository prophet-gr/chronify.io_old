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
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|jetbrains-mono:400,500" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-surface-50" x-data="{ sidebarOpen: false }">

    {{-- Mobile sidebar backdrop --}}
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-surface-900/50 lg:hidden"
        x-on:click="sidebarOpen = false"
        x-cloak
    ></div>

    {{-- Sidebar --}}
    <aside
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-surface-900 text-white transition-transform duration-200 lg:translate-x-0"
    >
        {{-- Logo --}}
        <div class="flex items-center gap-3 px-6 h-16 border-b border-surface-700">
            <svg class="w-8 h-8 text-brand-400" fill="none" viewBox="0 0 32 32" stroke="currentColor" stroke-width="2">
                <circle cx="16" cy="16" r="13" />
                <path d="M16 8v8l5.5 3.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="text-lg font-bold tracking-tight">Chronify</span>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto" aria-label="Main navigation">
            <x-layouts.sidebar-link href="/dashboard" icon="home" :active="request()->is('dashboard')">
                Dashboard
            </x-layouts.sidebar-link>
            <x-layouts.sidebar-link href="/timer" icon="clock" :active="request()->is('timer*')">
                Timer
            </x-layouts.sidebar-link>
            <x-layouts.sidebar-link href="/projects" icon="folder" :active="request()->is('projects*')">
                Projects
            </x-layouts.sidebar-link>
            <x-layouts.sidebar-link href="/tasks" icon="check-square" :active="request()->is('tasks*')">
                Tasks
            </x-layouts.sidebar-link>
            <x-layouts.sidebar-link href="/time-entries" icon="list" :active="request()->is('time-entries*')">
                Time Entries
            </x-layouts.sidebar-link>

            <div class="pt-4 mt-4 border-t border-surface-700">
                <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-surface-400">Settings</p>
                <x-layouts.sidebar-link href="/team" icon="users" :active="request()->is('team*')">
                    Team
                </x-layouts.sidebar-link>
                <x-layouts.sidebar-link href="/settings" icon="settings" :active="request()->is('settings*')">
                    Settings
                </x-layouts.sidebar-link>
            </div>
        </nav>

        {{-- User menu --}}
        <div class="px-3 py-4 border-t border-surface-700">
            <div class="flex items-center gap-3 px-3 py-2">
                <x-ui.avatar name="User" size="sm" />
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium truncate">{{ auth()->user()->name ?? 'User' }}</p>
                    <p class="text-xs text-surface-400 truncate">{{ auth()->user()->email ?? '' }}</p>
                </div>
            </div>
        </div>
    </aside>

    {{-- Main content area --}}
    <div class="lg:pl-64 min-h-screen flex flex-col">
        {{-- Top bar --}}
        <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-md border-b border-surface-200">
            <div class="flex items-center justify-between h-16 px-4 sm:px-6">
                {{-- Mobile menu button --}}
                <button
                    x-on:click="sidebarOpen = true"
                    class="lg:hidden p-2 -ml-2 text-surface-600 hover:text-surface-900 rounded-lg"
                    aria-label="Open sidebar"
                >
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                {{-- Page title slot --}}
                <div class="flex-1 min-w-0">
                    @isset($pageTitle)
                        <h1 class="text-lg font-semibold text-surface-900 truncate">{{ $pageTitle }}</h1>
                    @endisset
                </div>

                {{-- Header actions --}}
                <div class="flex items-center gap-3">
                    @isset($headerActions)
                        {{ $headerActions }}
                    @endisset
                </div>
            </div>
        </header>

        {{-- Page content --}}
        <main class="flex-1 px-4 sm:px-6 py-6">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
