<section class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden">
    {{-- Gradient background --}}
    <div class="absolute inset-0 bg-gradient-to-b from-brand-50/60 via-white to-white"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-brand-400/10 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 border border-brand-200 text-brand-700 text-sm font-medium mb-6">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                Trusted by 5,000+ teams worldwide
            </div>

            {{-- Headline --}}
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-surface-900 leading-[1.1]">
                Track time with
                <span class="text-brand-600">precision</span>,
                not effort
            </h1>

            {{-- Subheadline --}}
            <p class="mt-6 text-lg sm:text-xl text-surface-500 leading-relaxed max-w-2xl mx-auto">
                Chronify helps teams and freelancers track hours, manage projects, and generate insightful reports — so you can focus on the work that matters.
            </p>

            {{-- CTA Buttons --}}
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/api/register" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 text-base font-semibold text-white bg-brand-600 hover:bg-brand-700 rounded-xl shadow-lg shadow-brand-500/25 transition-all hover:shadow-xl hover:shadow-brand-500/30">
                    Start Free Trial
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <a href="#how-it-works" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 text-base font-semibold text-surface-700 bg-white hover:bg-surface-50 border border-surface-300 rounded-xl transition-colors">
                    <svg class="w-5 h-5 mr-2 text-brand-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                    </svg>
                    See How It Works
                </a>
            </div>

            {{-- Social proof stats --}}
            <div class="mt-16 grid grid-cols-2 sm:grid-cols-4 gap-8 max-w-2xl mx-auto">
                <div class="text-center">
                    <div class="text-2xl sm:text-3xl font-bold text-surface-900">5K+</div>
                    <div class="text-sm text-surface-500 mt-1">Active Teams</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl sm:text-3xl font-bold text-surface-900">2M+</div>
                    <div class="text-sm text-surface-500 mt-1">Hours Tracked</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl sm:text-3xl font-bold text-surface-900">99.9%</div>
                    <div class="text-sm text-surface-500 mt-1">Uptime</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl sm:text-3xl font-bold text-surface-900">4.9/5</div>
                    <div class="text-sm text-surface-500 mt-1">User Rating</div>
                </div>
            </div>
        </div>

        {{-- Hero Visual (Dashboard Preview) — decorative, hidden from assistive tech --}}
        <div class="mt-16 sm:mt-20 max-w-5xl mx-auto" aria-hidden="true">
            <div class="relative rounded-2xl border border-surface-200 shadow-2xl shadow-surface-900/10 overflow-hidden bg-surface-900">
                {{-- Browser Chrome --}}
                <div class="flex items-center gap-2 px-4 py-3 bg-surface-800 border-b border-surface-700">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-surface-600"></div>
                        <div class="w-3 h-3 rounded-full bg-surface-600"></div>
                        <div class="w-3 h-3 rounded-full bg-surface-600"></div>
                    </div>
                    <div class="flex-1 mx-4">
                        <div class="bg-surface-700 rounded-md px-3 py-1.5 text-xs text-surface-400 text-center">app.chronify.io/dashboard</div>
                    </div>
                </div>
                {{-- Dashboard Mockup --}}
                <div class="p-6 sm:p-8">
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="bg-surface-800 rounded-xl p-4">
                            <div class="text-xs text-surface-400 mb-1">Today</div>
                            <div class="text-2xl font-bold text-white timer-display">04:32:15</div>
                            <div class="mt-2 h-1.5 bg-surface-700 rounded-full">
                                <div class="h-full w-3/5 bg-timer-active rounded-full"></div>
                            </div>
                        </div>
                        <div class="bg-surface-800 rounded-xl p-4">
                            <div class="text-xs text-surface-400 mb-1">This Week</div>
                            <div class="text-2xl font-bold text-white timer-display">28:45:00</div>
                            <div class="mt-2 h-1.5 bg-surface-700 rounded-full">
                                <div class="h-full w-4/5 bg-brand-500 rounded-full"></div>
                            </div>
                        </div>
                        <div class="bg-surface-800 rounded-xl p-4">
                            <div class="text-xs text-surface-400 mb-1">Projects</div>
                            <div class="text-2xl font-bold text-white">12</div>
                            <div class="mt-2 text-xs text-success-500">3 active timers</div>
                        </div>
                    </div>
                    <div class="bg-surface-800 rounded-xl p-4">
                        <div class="flex items-center justify-between mb-3">
                            <div class="text-sm font-medium text-white">Recent Entries</div>
                            <div class="text-xs text-surface-400">Today</div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between py-2 border-b border-surface-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 rounded-full bg-brand-500"></div>
                                    <span class="text-sm text-surface-300">API Integration</span>
                                </div>
                                <span class="text-sm text-surface-400 timer-display">02:15:30</span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-surface-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 rounded-full bg-success-500"></div>
                                    <span class="text-sm text-surface-300">Design Review</span>
                                </div>
                                <span class="text-sm text-surface-400 timer-display">01:30:00</span>
                            </div>
                            <div class="flex items-center justify-between py-2">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 rounded-full bg-warning-500"></div>
                                    <span class="text-sm text-surface-300">Client Meeting</span>
                                </div>
                                <span class="text-sm text-surface-400 timer-display">00:46:45</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
