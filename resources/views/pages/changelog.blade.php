<x-layouts.landing title="Changelog — Chronify">
    <x-landing.navbar />

    <section class="pt-32 pb-20 sm:pt-40 sm:pb-28">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-surface-900 tracking-tight mb-4">Changelog</h1>
            <p class="text-lg text-surface-600 mb-12">Stay up to date with the latest features, improvements, and fixes in Chronify.</p>

            <div class="space-y-12">
                {{-- v1.0.0 --}}
                <article class="relative pl-8 border-l-2 border-brand-200">
                    <div class="absolute -left-2.5 top-0 w-5 h-5 bg-brand-600 rounded-full border-4 border-white"></div>
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs font-mono font-semibold text-brand-600 bg-brand-50 px-2.5 py-1 rounded-full">v1.0.0</span>
                        <time class="text-sm text-surface-500">March 2026</time>
                    </div>
                    <h2 class="text-xl font-bold text-surface-900 mb-3">Initial Launch</h2>
                    <div class="text-surface-600 space-y-2">
                        <h3 class="font-semibold text-surface-800 text-sm uppercase tracking-wider mt-4">Features</h3>
                        <ul class="list-disc list-inside space-y-1.5 text-sm">
                            <li>One-click time tracking with real-time timer</li>
                            <li>Project and task management with color coding</li>
                            <li>Team workspaces with member roles and permissions</li>
                            <li>Detailed time reports with filtering and export (CSV, PDF)</li>
                            <li>Dashboard with daily, weekly, and monthly summaries</li>
                            <li>User registration and authentication</li>
                            <li>Responsive landing page with pricing tiers</li>
                        </ul>

                        <h3 class="font-semibold text-surface-800 text-sm uppercase tracking-wider mt-4">Technical</h3>
                        <ul class="list-disc list-inside space-y-1.5 text-sm">
                            <li>Built on Laravel 11 with Inertia.js and React</li>
                            <li>Tailwind CSS design system with dark mode support</li>
                            <li>RESTful API with Sanctum authentication</li>
                            <li>Database schema optimized for time-series queries</li>
                        </ul>
                    </div>
                </article>

                {{-- Upcoming --}}
                <article class="relative pl-8 border-l-2 border-surface-200">
                    <div class="absolute -left-2.5 top-0 w-5 h-5 bg-surface-300 rounded-full border-4 border-white"></div>
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs font-mono font-semibold text-surface-500 bg-surface-100 px-2.5 py-1 rounded-full">Next</span>
                        <time class="text-sm text-surface-500">Coming Soon</time>
                    </div>
                    <h2 class="text-xl font-bold text-surface-900 mb-3">What's Next</h2>
                    <ul class="list-disc list-inside space-y-1.5 text-sm text-surface-600">
                        <li>Third-party integrations (Slack, Jira, GitHub, Google Calendar)</li>
                        <li>React Native mobile app for iOS and Android</li>
                        <li>Team billing and subscription management</li>
                        <li>Advanced analytics and productivity insights</li>
                        <li>API webhooks for custom workflows</li>
                        <li>Browser extension for one-click tracking</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
