<x-layouts.landing title="Blog — Chronify">
    <x-landing.navbar />

    <section class="pt-32 pb-20 sm:pt-40 sm:pb-28">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-surface-900 tracking-tight mb-4">Blog</h1>
            <p class="text-lg text-surface-600 mb-12">Tips on productivity, time management, and making the most of Chronify.</p>

            <div class="grid sm:grid-cols-2 gap-8">
                {{-- Post 1 --}}
                <article class="group">
                    <div class="aspect-video bg-gradient-to-br from-brand-500 to-brand-700 rounded-xl mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/30" fill="none" viewBox="0 0 32 32" stroke="currentColor" stroke-width="1.5">
                            <circle cx="16" cy="16" r="13" />
                            <path d="M16 8v8l5.5 3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-surface-500 mb-2">
                        <span>Productivity</span>
                        <span>&middot;</span>
                        <time>March 26, 2026</time>
                    </div>
                    <h2 class="text-lg font-bold text-surface-900 group-hover:text-brand-600 transition-colors mb-2">Why Time Tracking Is the Secret to Better Work-Life Balance</h2>
                    <p class="text-sm text-surface-600">Most people think time tracking is about billing clients. But the real benefit is understanding where your hours actually go — and reclaiming the ones that matter.</p>
                </article>

                {{-- Post 2 --}}
                <article class="group">
                    <div class="aspect-video bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-surface-500 mb-2">
                        <span>Teams</span>
                        <span>&middot;</span>
                        <time>March 24, 2026</time>
                    </div>
                    <h2 class="text-lg font-bold text-surface-900 group-hover:text-brand-600 transition-colors mb-2">5 Time Tracking Mistakes Remote Teams Make (And How to Fix Them)</h2>
                    <p class="text-sm text-surface-600">Remote teams often struggle with inconsistent tracking, forgotten hours, and timezone confusion. Here's how to build better habits as a distributed team.</p>
                </article>

                {{-- Post 3 --}}
                <article class="group">
                    <div class="aspect-video bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-xl mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-surface-500 mb-2">
                        <span>Freelancers</span>
                        <span>&middot;</span>
                        <time>March 20, 2026</time>
                    </div>
                    <h2 class="text-lg font-bold text-surface-900 group-hover:text-brand-600 transition-colors mb-2">The Freelancer's Guide to Accurate Client Billing</h2>
                    <p class="text-sm text-surface-600">Stop leaving money on the table. Learn how precise time tracking helps freelancers bill confidently and build trust with clients.</p>
                </article>

                {{-- Post 4 --}}
                <article class="group">
                    <div class="aspect-video bg-gradient-to-br from-amber-500 to-amber-700 rounded-xl mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-surface-500 mb-2">
                        <span>Product</span>
                        <span>&middot;</span>
                        <time>March 18, 2026</time>
                    </div>
                    <h2 class="text-lg font-bold text-surface-900 group-hover:text-brand-600 transition-colors mb-2">Introducing Chronify: Time Tracking That Gets Out of Your Way</h2>
                    <p class="text-sm text-surface-600">We built Chronify because existing time trackers felt like a chore. Here's our story and what makes us different.</p>
                </article>
            </div>

            <div class="mt-12 text-center">
                <p class="text-surface-500 text-sm">More posts coming soon. Stay tuned!</p>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
