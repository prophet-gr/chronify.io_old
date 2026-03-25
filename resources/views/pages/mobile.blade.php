<x-layouts.landing title="Mobile Apps — Chronify">
    <x-landing.navbar />

    <section class="pt-32 pb-20 sm:pt-40 sm:pb-28">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-extrabold text-surface-900 tracking-tight mb-4">Track Time Anywhere</h1>
                <p class="text-lg text-surface-600 max-w-2xl mx-auto">Chronify's mobile apps bring powerful time tracking to your pocket. Start timers, log hours, and review reports — all from your phone.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Phone mockup --}}
                <div class="flex justify-center">
                    <div class="w-64 bg-surface-900 rounded-[2.5rem] p-3 shadow-2xl">
                        <div class="bg-white rounded-[2rem] overflow-hidden">
                            <div class="bg-brand-600 px-6 pt-12 pb-8 text-center">
                                <svg class="w-12 h-12 text-white mx-auto mb-3" fill="none" viewBox="0 0 32 32" stroke="currentColor" stroke-width="2">
                                    <circle cx="16" cy="16" r="13" />
                                    <path d="M16 8v8l5.5 3.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="text-white font-bold text-lg">Chronify</p>
                            </div>
                            <div class="px-6 py-8 space-y-4">
                                <div class="bg-surface-50 rounded-lg p-3">
                                    <p class="text-xs text-surface-500 mb-1">Current Timer</p>
                                    <p class="text-2xl font-mono font-bold text-surface-900">02:34:17</p>
                                    <p class="text-xs text-surface-600 mt-1">Website Redesign</p>
                                </div>
                                <div class="bg-surface-50 rounded-lg p-3">
                                    <p class="text-xs text-surface-500 mb-1">Today</p>
                                    <p class="text-lg font-semibold text-surface-900">6h 42m</p>
                                </div>
                                <div class="w-full bg-brand-600 text-white text-center py-3 rounded-lg text-sm font-semibold">
                                    Stop Timer
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Features list --}}
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-brand-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 8v4l3 3" stroke-linecap="round" /><circle cx="12" cy="12" r="9" /></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900 mb-1">One-Tap Timer</h3>
                            <p class="text-sm text-surface-600">Start and stop timers instantly. Switch between tasks with a single tap.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900 mb-1">Reports on the Go</h3>
                            <p class="text-sm text-surface-600">View daily and weekly summaries, filter by project, and share reports from anywhere.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900 mb-1">Team Sync</h3>
                            <p class="text-sm text-surface-600">Everything syncs in real-time across all devices. Your team sees updates instantly.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900 mb-1">Smart Reminders</h3>
                            <p class="text-sm text-surface-600">Get gentle nudges to start your timer or log forgotten hours at the end of the day.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-20 text-center bg-surface-50 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-surface-900 mb-3">Coming Soon to iOS & Android</h2>
                <p class="text-surface-600 mb-6">Our mobile apps are currently in development. Sign up to be notified when they launch.</p>
                <a href="/register" class="inline-flex items-center gap-2 px-6 py-3 bg-brand-600 text-white font-semibold rounded-lg hover:bg-brand-700 transition-colors">
                    Get Early Access
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" /></svg>
                </a>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
