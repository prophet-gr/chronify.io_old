<x-layouts.landing title="Integrations — Chronify">
    <x-landing.navbar />

    {{-- Hero --}}
    <section class="relative pt-32 pb-16 sm:pt-40 sm:pb-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-50/40 via-white to-white"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm font-semibold text-brand-600 uppercase tracking-wide mb-3">Integrations</p>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-surface-900 tracking-tight mb-4">Connect Chronify to your workflow</h1>
            <p class="text-lg text-surface-500 max-w-2xl mx-auto">We're building integrations with the tools your team already uses. Streamline your workflow and keep everything in sync.</p>
        </div>
    </section>

    {{-- Built-In Features --}}
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-lg font-bold text-surface-900 mb-6">Available Now</h2>
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="border border-surface-200 rounded-xl p-5 bg-white">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-9 h-9 bg-brand-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </div>
                        <h3 class="font-semibold text-surface-900">CSV & PDF Export</h3>
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full ml-auto">Live</span>
                    </div>
                    <p class="text-sm text-surface-600">Export timesheets and reports to CSV or PDF for invoicing and payroll.</p>
                </div>
                <div class="border border-surface-200 rounded-xl p-5 bg-white">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-9 h-9 bg-brand-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </div>
                        <h3 class="font-semibold text-surface-900">REST API</h3>
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full ml-auto">Live</span>
                    </div>
                    <p class="text-sm text-surface-600">Full API access for building custom integrations and automations.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Coming Soon Integrations --}}
    <section class="py-12 sm:py-16 bg-surface-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-bold text-surface-900">Coming Soon</h2>
                <span class="text-xs text-surface-400">Launching Q2–Q3 2026</span>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                {{-- Slack --}}
                <div class="border border-surface-200 rounded-xl p-5 bg-white hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24"><path d="M5.042 15.165a2.528 2.528 0 0 1-2.52 2.523A2.528 2.528 0 0 1 0 15.165a2.527 2.527 0 0 1 2.522-2.52h2.52v2.52zM6.313 15.165a2.527 2.527 0 0 1 2.521-2.52 2.527 2.527 0 0 1 2.521 2.52v6.313A2.528 2.528 0 0 1 8.834 24a2.528 2.528 0 0 1-2.521-2.522v-6.313zM8.834 5.042a2.528 2.528 0 0 1-2.521-2.52A2.528 2.528 0 0 1 8.834 0a2.528 2.528 0 0 1 2.521 2.522v2.52H8.834zM8.834 6.313a2.528 2.528 0 0 1 2.521 2.521 2.528 2.528 0 0 1-2.521 2.521H2.522A2.528 2.528 0 0 1 0 8.834a2.528 2.528 0 0 1 2.522-2.521h6.312zM18.956 8.834a2.528 2.528 0 0 1 2.522-2.521A2.528 2.528 0 0 1 24 8.834a2.528 2.528 0 0 1-2.522 2.521h-2.522V8.834zM17.688 8.834a2.528 2.528 0 0 1-2.523 2.521 2.527 2.527 0 0 1-2.52-2.521V2.522A2.527 2.527 0 0 1 15.165 0a2.528 2.528 0 0 1 2.523 2.522v6.312zM15.165 18.956a2.528 2.528 0 0 1 2.523 2.522A2.528 2.528 0 0 1 15.165 24a2.527 2.527 0 0 1-2.52-2.522v-2.522h2.52zM15.165 17.688a2.527 2.527 0 0 1-2.52-2.523 2.526 2.526 0 0 1 2.52-2.52h6.313A2.527 2.527 0 0 1 24 15.165a2.528 2.528 0 0 1-2.522 2.523h-6.313z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900">Slack</h3>
                            <span class="text-[10px] font-medium text-brand-600 bg-brand-50 px-2 py-0.5 rounded-full">Q2 2026</span>
                        </div>
                    </div>
                    <p class="text-sm text-surface-600">Timer notifications, slash commands to log time, and weekly report sharing in your channels.</p>
                </div>

                {{-- Jira --}}
                <div class="border border-surface-200 rounded-xl p-5 bg-white hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M11.571 11.513H0a5.218 5.218 0 0 0 5.232 5.215h2.13v2.057A5.215 5.215 0 0 0 12.575 24V12.518a1.005 1.005 0 0 0-1.005-1.005zm5.723-5.756H5.736a5.215 5.215 0 0 0 5.215 5.214h2.129v2.058a5.218 5.218 0 0 0 5.215 5.214V6.758a1.001 1.001 0 0 0-1.001-1.001zM23.013 0H11.455a5.215 5.215 0 0 0 5.215 5.215h2.129v2.057A5.215 5.215 0 0 0 24.013 12.5V1.005A1.005 1.005 0 0 0 23.013 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900">Jira</h3>
                            <span class="text-[10px] font-medium text-brand-600 bg-brand-50 px-2 py-0.5 rounded-full">Q2 2026</span>
                        </div>
                    </div>
                    <p class="text-sm text-surface-600">Sync projects and issues, log time directly against Jira tickets, and keep sprint data accurate.</p>
                </div>

                {{-- GitHub --}}
                <div class="border border-surface-200 rounded-xl p-5 bg-white hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900">GitHub</h3>
                            <span class="text-[10px] font-medium text-brand-600 bg-brand-50 px-2 py-0.5 rounded-full">Q2 2026</span>
                        </div>
                    </div>
                    <p class="text-sm text-surface-600">Track time on pull requests and issues. Auto-log coding sessions and link commits to entries.</p>
                </div>

                {{-- Google Calendar --}}
                <div class="border border-surface-200 rounded-xl p-5 bg-white hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" /><path d="M16 2v4M8 2v4M3 10h18" /><path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01" /></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900">Google Calendar</h3>
                            <span class="text-[10px] font-medium text-brand-600 bg-brand-50 px-2 py-0.5 rounded-full">Q3 2026</span>
                        </div>
                    </div>
                    <p class="text-sm text-surface-600">Import calendar events as time entries. See your schedule alongside tracked time.</p>
                </div>

                {{-- Trello --}}
                <div class="border border-surface-200 rounded-xl p-5 bg-white hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-sky-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-sky-600" fill="currentColor" viewBox="0 0 24 24"><path d="M21 0H3C1.343 0 0 1.343 0 3v18c0 1.656 1.343 3 3 3h18c1.656 0 3-1.344 3-3V3c0-1.657-1.344-3-3-3zM10.44 18.18c0 .795-.645 1.44-1.44 1.44H4.56c-.795 0-1.44-.646-1.44-1.44V4.56c0-.795.645-1.44 1.44-1.44H9c.795 0 1.44.645 1.44 1.44v13.62zm10.44-6c0 .794-.645 1.44-1.44 1.44h-4.44c-.795 0-1.44-.646-1.44-1.44V4.56c0-.795.645-1.44 1.44-1.44h4.44c.795 0 1.44.645 1.44 1.44v7.62z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900">Trello</h3>
                            <span class="text-[10px] font-medium text-brand-600 bg-brand-50 px-2 py-0.5 rounded-full">Q3 2026</span>
                        </div>
                    </div>
                    <p class="text-sm text-surface-600">Track time on Trello cards, sync boards as projects, and add time estimates.</p>
                </div>

                {{-- Zapier --}}
                <div class="border border-surface-200 rounded-xl p-5 bg-white hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-surface-900">Zapier</h3>
                            <span class="text-[10px] font-medium text-brand-600 bg-brand-50 px-2 py-0.5 rounded-full">Q3 2026</span>
                        </div>
                    </div>
                    <p class="text-sm text-surface-600">Connect Chronify to 5,000+ apps. Automate time entry creation and report sharing.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Request / API CTA --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-surface-50 rounded-2xl p-8 text-center">
                    <div class="w-12 h-12 rounded-xl bg-brand-50 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="text-lg font-bold text-surface-900 mb-2">Don't see your tool?</h3>
                    <p class="text-sm text-surface-600 mb-5">We're always adding new integrations. Let us know what you need and we'll prioritize it.</p>
                    <a href="/contact" class="inline-flex items-center gap-2 px-5 py-2.5 bg-brand-600 text-white text-sm font-semibold rounded-lg hover:bg-brand-700 transition-colors">
                        Request an Integration
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </a>
                </div>

                <div class="bg-surface-900 rounded-2xl p-8 text-center">
                    <div class="w-12 h-12 rounded-xl bg-surface-800 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Build Your Own</h3>
                    <p class="text-sm text-surface-400 mb-5">Our REST API gives you full access to time entries, projects, and reports. Build custom integrations.</p>
                    <a href="/register" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-surface-900 text-sm font-semibold rounded-lg hover:bg-surface-100 transition-colors">
                        Get API Access
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
