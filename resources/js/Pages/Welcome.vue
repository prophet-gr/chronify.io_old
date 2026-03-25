<script setup>
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Welcome" />
    <div class="min-h-screen bg-surface-900 flex flex-col items-center justify-center px-4">
        <div class="text-center">
            <div class="w-16 h-16 bg-brand-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-3">Chronify.io</h1>
            <p class="text-lg text-surface-400 mb-8 max-w-md">
                Powerful time tracking for teams and freelancers. Track hours, manage projects, and generate reports.
            </p>
            <div class="flex items-center justify-center gap-4">
                <a
                    href="/api/login"
                    class="px-6 py-3 bg-brand-500 hover:bg-brand-600 text-white rounded-lg font-medium shadow-sm transition-colors"
                >
                    Sign In
                </a>
                <a
                    href="/api/register"
                    class="px-6 py-3 bg-surface-800 hover:bg-surface-700 text-surface-200 rounded-lg font-medium transition-colors"
                >
                    Create Account
                </a>
            </div>
        </div>
    </div>
</template>
