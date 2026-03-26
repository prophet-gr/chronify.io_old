<x-layouts.landing title="Mobile Apps — Chronify">
    <x-landing.navbar />

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-50/60 via-white to-white"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-brand-400/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                {{-- Text Content --}}
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 border border-brand-200 text-brand-700 text-sm font-medium mb-6">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        Coming Soon to iOS & Android
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-surface-900 leading-[1.1] mb-6">
                        Track time from
                        <span class="text-brand-600">anywhere</span>
                    </h1>

                    <p class="text-lg text-surface-500 leading-relaxed mb-8 max-w-lg">
                        Chronify's native mobile apps bring the full power of time tracking to your pocket. Start timers, log hours, manage projects, and review reports — all from your phone.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3 mb-8">
                        {{-- App Store Button --}}
                        <div class="inline-flex items-center gap-3 px-5 py-3 bg-surface-900 text-white rounded-xl opacity-80 cursor-default">
                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/></svg>
                            <div>
                                <div class="text-[10px] leading-none opacity-80">Coming soon on</div>
                                <div class="text-sm font-semibold leading-tight">App Store</div>
                            </div>
                        </div>
                        {{-- Google Play Button --}}
                        <div class="inline-flex items-center gap-3 px-5 py-3 bg-surface-900 text-white rounded-xl opacity-80 cursor-default">
                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor"><path d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 01-.61-.92V2.734a1 1 0 01.609-.92zm10.89 10.893l2.302 2.302-10.937 6.333 8.635-8.635zm3.199-3.199l2.807 1.626a1 1 0 010 1.732l-2.807 1.626L15.206 12l2.492-2.492zM5.864 2.658L16.8 8.99l-2.302 2.302-8.634-8.634z"/></svg>
                            <div>
                                <div class="text-[10px] leading-none opacity-80">Coming soon on</div>
                                <div class="text-sm font-semibold leading-tight">Google Play</div>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-surface-400">Sign up now and be the first to know when our mobile apps launch.</p>
                </div>

                {{-- Dual Phone Mockup --}}
                <div class="flex justify-center items-end gap-6 lg:gap-8">
                    {{-- Phone 1: Timer Screen --}}
                    <div class="w-56 sm:w-60 bg-surface-900 rounded-[2.5rem] p-2.5 shadow-2xl relative z-10">
                        <div class="bg-white rounded-[2rem] overflow-hidden">
                            {{-- Status Bar --}}
                            <div class="flex items-center justify-between px-5 pt-3 pb-1">
                                <span class="text-[10px] font-semibold text-surface-900">9:41</span>
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-surface-900" fill="currentColor" viewBox="0 0 24 24"><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3a4.237 4.237 0 00-6 0zm-4-4l2 2a7.074 7.074 0 0110 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg>
                                    <svg class="w-3 h-3 text-surface-900" fill="currentColor" viewBox="0 0 24 24"><path d="M15.67 4H14V2h-4v2H8.33C7.6 4 7 4.6 7 5.33v15.33C7 21.4 7.6 22 8.33 22h7.33c.74 0 1.34-.6 1.34-1.33V5.33C17 4.6 16.4 4 15.67 4z"/></svg>
                                </div>
                            </div>
                            {{-- App Header --}}
                            <div class="bg-brand-600 px-5 pt-6 pb-6 text-center">
                                <svg class="w-8 h-8 text-white mx-auto mb-2" fill="none" viewBox="0 0 32 32" stroke="currentColor" stroke-width="2">
                                    <circle cx="16" cy="16" r="13" />
                                    <path d="M16 8v8l5.5 3.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="text-white/80 text-xs font-medium">Currently Tracking</p>
                                <p class="text-white font-bold text-3xl font-mono mt-1 tracking-wider">02:34:17</p>
                                <p class="text-white/70 text-xs mt-1">Website Redesign</p>
                            </div>
                            {{-- Quick Actions --}}
                            <div class="px-4 py-4 space-y-3">
                                <div class="bg-red-50 text-red-600 text-center py-2.5 rounded-xl text-xs font-bold">
                                    Stop Timer
                                </div>
                                <div class="bg-surface-50 rounded-xl p-3">
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="text-[10px] font-semibold text-surface-500 uppercase tracking-wider">Today's Summary</p>
                                        <p class="text-[10px] text-surface-400">3 entries</p>
                                    </div>
                                    <p class="text-lg font-bold text-surface-900">6h 42m</p>
                                    <div class="mt-2 h-1.5 bg-surface-200 rounded-full overflow-hidden">
                                        <div class="h-full w-[84%] bg-brand-500 rounded-full"></div>
                                    </div>
                                    <p class="text-[10px] text-surface-400 mt-1">84% of 8h goal</p>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between py-1.5">
                                        <div class="flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full bg-brand-500"></div>
                                            <span class="text-xs text-surface-700">API Integration</span>
                                        </div>
                                        <span class="text-xs font-mono text-surface-400">2:15</span>
                                    </div>
                                    <div class="flex items-center justify-between py-1.5">
                                        <div class="flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                                            <span class="text-xs text-surface-700">Design Review</span>
                                        </div>
                                        <span class="text-xs font-mono text-surface-400">1:30</span>
                                    </div>
                                </div>
                            </div>
                            {{-- Bottom Nav --}}
                            <div class="flex items-center justify-around py-2.5 border-t border-surface-100">
                                <div class="flex flex-col items-center gap-0.5">
                                    <svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 8v4l3 3" stroke-linecap="round" /><circle cx="12" cy="12" r="9" /></svg>
                                    <span class="text-[9px] font-semibold text-brand-600">Timer</span>
                                </div>
                                <div class="flex flex-col items-center gap-0.5">
                                    <svg class="w-4 h-4 text-surface-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    <span class="text-[9px] text-surface-400">Projects</span>
                                </div>
                                <div class="flex flex-col items-center gap-0.5">
                                    <svg class="w-4 h-4 text-surface-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    <span class="text-[9px] text-surface-400">Reports</span>
                                </div>
                                <div class="flex flex-col items-center gap-0.5">
                                    <svg class="w-4 h-4 text-surface-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    <span class="text-[9px] text-surface-400">Profile</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Phone 2: Reports Screen (offset lower) --}}
                    <div class="hidden sm:block w-52 sm:w-56 bg-surface-900 rounded-[2.5rem] p-2.5 shadow-2xl translate-y-8">
                        <div class="bg-white rounded-[2rem] overflow-hidden">
                            {{-- Status Bar --}}
                            <div class="flex items-center justify-between px-5 pt-3 pb-1">
                                <span class="text-[10px] font-semibold text-surface-900">9:41</span>
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-surface-900" fill="currentColor" viewBox="0 0 24 24"><path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3a4.237 4.237 0 00-6 0zm-4-4l2 2a7.074 7.074 0 0110 0l2-2C15.14 9.14 8.87 9.14 5 13z"/></svg>
                                    <svg class="w-3 h-3 text-surface-900" fill="currentColor" viewBox="0 0 24 24"><path d="M15.67 4H14V2h-4v2H8.33C7.6 4 7 4.6 7 5.33v15.33C7 21.4 7.6 22 8.33 22h7.33c.74 0 1.34-.6 1.34-1.33V5.33C17 4.6 16.4 4 15.67 4z"/></svg>
                                </div>
                            </div>
                            {{-- Reports Header --}}
                            <div class="px-5 pt-4 pb-3">
                                <p class="text-sm font-bold text-surface-900">Weekly Report</p>
                                <p class="text-[10px] text-surface-400">Mar 18 — Mar 24, 2026</p>
                            </div>
                            {{-- Chart Mockup --}}
                            <div class="px-4 pb-3">
                                <div class="bg-surface-50 rounded-xl p-3">
                                    <div class="flex items-end justify-between gap-1.5 h-24">
                                        <div class="flex-1 flex flex-col items-center gap-1">
                                            <div class="w-full bg-brand-200 rounded-t" style="height: 60%"></div>
                                            <span class="text-[8px] text-surface-400">M</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1">
                                            <div class="w-full bg-brand-300 rounded-t" style="height: 80%"></div>
                                            <span class="text-[8px] text-surface-400">T</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1">
                                            <div class="w-full bg-brand-400 rounded-t" style="height: 45%"></div>
                                            <span class="text-[8px] text-surface-400">W</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1">
                                            <div class="w-full bg-brand-500 rounded-t" style="height: 90%"></div>
                                            <span class="text-[8px] text-surface-400">T</span>
                                        </div>
                                        <div class="flex-1 flex flex-col items-center gap-1">
                                            <div class="w-full bg-brand-600 rounded-t" style="height: 70%"></div>
                                            <span class="text-[8px] text-surface-400">F</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 flex items-center justify-between">
                                        <div>
                                            <p class="text-lg font-bold text-surface-900">38h 12m</p>
                                            <p class="text-[10px] text-surface-400">Total this week</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-xs font-semibold text-emerald-600">+12%</p>
                                            <p class="text-[10px] text-surface-400">vs last week</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Project Breakdown --}}
                            <div class="px-4 pb-3">
                                <p class="text-[10px] font-semibold text-surface-500 uppercase tracking-wider mb-2">By Project</p>
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-brand-500 shrink-0"></div>
                                        <span class="text-[11px] text-surface-700 flex-1">Website Redesign</span>
                                        <span class="text-[11px] font-mono text-surface-500">14:30</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></div>
                                        <span class="text-[11px] text-surface-700 flex-1">Mobile App</span>
                                        <span class="text-[11px] font-mono text-surface-500">12:45</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-amber-500 shrink-0"></div>
                                        <span class="text-[11px] text-surface-700 flex-1">Client Meetings</span>
                                        <span class="text-[11px] font-mono text-surface-500">6:20</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-purple-500 shrink-0"></div>
                                        <span class="text-[11px] text-surface-700 flex-1">Internal Tasks</span>
                                        <span class="text-[11px] font-mono text-surface-500">4:37</span>
                                    </div>
                                </div>
                            </div>
                            {{-- Bottom Nav --}}
                            <div class="flex items-center justify-around py-2.5 border-t border-surface-100">
                                <div class="flex flex-col items-center gap-0.5">
                                    <svg class="w-4 h-4 text-surface-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 8v4l3 3" stroke-linecap="round" /><circle cx="12" cy="12" r="9" /></svg>
                                    <span class="text-[9px] text-surface-400">Timer</span>
                                </div>
                                <div class="flex flex-col items-center gap-0.5">
                                    <svg class="w-4 h-4 text-surface-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    <span class="text-[9px] text-surface-400">Projects</span>
                                </div>
                                <div class="flex flex-col items-center gap-0.5">
                                    <svg class="w-4 h-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    <span class="text-[9px] font-semibold text-brand-600">Reports</span>
                                </div>
                                <div class="flex flex-col items-center gap-0.5">
                                    <svg class="w-4 h-4 text-surface-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    <span class="text-[9px] text-surface-400">Profile</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Grid --}}
    <section class="py-20 sm:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <p class="text-sm font-semibold text-brand-600 uppercase tracking-wide mb-3">Mobile Features</p>
                <h2 class="text-3xl sm:text-4xl font-bold text-surface-900 tracking-tight">
                    Everything you need, in your pocket
                </h2>
                <p class="mt-4 text-lg text-surface-500">
                    Our mobile apps aren't a watered-down version — they're the full Chronify experience, optimized for touch.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group p-6 rounded-2xl border border-surface-200 hover:border-brand-200 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5 group-hover:bg-brand-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M12 8v4l3 3" stroke-linecap="round" /><circle cx="12" cy="12" r="9" /></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-surface-900 mb-2">One-Tap Timer</h3>
                    <p class="text-sm text-surface-500 leading-relaxed">Start and stop timers with a single tap. Switch between tasks instantly without losing a second.</p>
                </div>

                <div class="group p-6 rounded-2xl border border-surface-200 hover:border-brand-200 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-5 group-hover:bg-emerald-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-surface-900 mb-2">Reports on the Go</h3>
                    <p class="text-sm text-surface-500 leading-relaxed">View daily, weekly, and monthly summaries. Filter by project and share reports directly from your phone.</p>
                </div>

                <div class="group p-6 rounded-2xl border border-surface-200 hover:border-brand-200 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-5 group-hover:bg-purple-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-surface-900 mb-2">Real-Time Sync</h3>
                    <p class="text-sm text-surface-500 leading-relaxed">Everything syncs instantly across all your devices. Start a timer on your phone, stop it on your laptop.</p>
                </div>

                <div class="group p-6 rounded-2xl border border-surface-200 hover:border-brand-200 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-5 group-hover:bg-amber-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-surface-900 mb-2">Smart Reminders</h3>
                    <p class="text-sm text-surface-500 leading-relaxed">Get gentle nudges when you forget to start your timer or haven't logged hours at the end of the day.</p>
                </div>

                <div class="group p-6 rounded-2xl border border-surface-200 hover:border-brand-200 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center mb-5 group-hover:bg-sky-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-surface-900 mb-2">Offline Mode</h3>
                    <p class="text-sm text-surface-500 leading-relaxed">Keep tracking even without a connection. All entries sync automatically when you're back online.</p>
                </div>

                <div class="group p-6 rounded-2xl border border-surface-200 hover:border-brand-200 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mb-5 group-hover:bg-rose-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-surface-900 mb-2">Secure & Private</h3>
                    <p class="text-sm text-surface-500 leading-relaxed">Biometric authentication, encrypted data in transit and at rest. Your time data stays yours.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Early Access CTA --}}
    <section class="py-20 sm:py-28 bg-surface-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-brand-600/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-brand-400/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">
                Be the first to try Chronify Mobile
            </h2>
            <p class="mt-4 text-lg text-surface-400 max-w-2xl mx-auto">
                Our mobile apps are in active development. Create your free account today and we'll notify you the moment they're ready to download.
            </p>
            <div class="mt-10">
                <a href="/register" class="inline-flex items-center justify-center px-8 py-3.5 text-base font-semibold text-white bg-brand-600 hover:bg-brand-500 rounded-xl shadow-lg shadow-brand-500/25 transition-all hover:shadow-xl hover:shadow-brand-500/30">
                    Get Early Access
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
            <p class="mt-6 text-sm text-surface-500">No credit card required. Free plan available.</p>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
