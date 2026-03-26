<x-layouts.landing title="Blog — Chronify">
    <x-landing.navbar />

    <section class="relative pt-32 pb-20 sm:pt-40 sm:pb-28">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-50/30 via-white to-white"></div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <p class="text-sm font-semibold text-brand-600 uppercase tracking-wide mb-3">Blog</p>
                <h1 class="text-4xl font-extrabold text-surface-900 tracking-tight mb-4">Insights on Productivity & Time</h1>
                <p class="text-lg text-surface-500 max-w-2xl mx-auto">Tips on time management, team productivity, and making the most of Chronify.</p>
            </div>

            {{-- Featured Post --}}
            <article class="mb-14 group">
                <div class="grid md:grid-cols-2 gap-8 items-center bg-white rounded-2xl border border-surface-200 shadow-card overflow-hidden">
                    <div class="aspect-video md:aspect-auto md:h-full bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center p-12">
                        <svg class="w-24 h-24 text-white/20" fill="none" viewBox="0 0 32 32" stroke="currentColor" stroke-width="1">
                            <circle cx="16" cy="16" r="13" />
                            <path d="M16 8v8l5.5 3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="p-6 md:p-8">
                        <div class="flex items-center gap-2 text-xs text-surface-500 mb-3">
                            <span class="px-2 py-0.5 bg-brand-50 text-brand-700 rounded-full font-medium">Product</span>
                            <span>&middot;</span>
                            <time>March 26, 2026</time>
                            <span>&middot;</span>
                            <span>5 min read</span>
                        </div>
                        <h2 class="text-xl font-bold text-surface-900 group-hover:text-brand-600 transition-colors mb-3">Introducing Chronify: Time Tracking That Gets Out of Your Way</h2>
                        <p class="text-sm text-surface-600 leading-relaxed mb-4">We built Chronify because existing time trackers felt like a chore. Here's our story, what makes us different, and our vision for the future of time tracking.</p>
                        <span class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600">
                            Read article
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </span>
                    </div>
                </div>
            </article>

            {{-- Post Grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Post 1 --}}
                <article class="group bg-white rounded-2xl border border-surface-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="aspect-video bg-gradient-to-br from-emerald-500 to-emerald-700 flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M12 8v4l3 3" stroke-linecap="round" /><circle cx="12" cy="12" r="9" /></svg>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-surface-500 mb-2">
                            <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-full font-medium">Productivity</span>
                            <span>&middot;</span>
                            <time>March 24, 2026</time>
                        </div>
                        <h3 class="text-base font-bold text-surface-900 group-hover:text-brand-600 transition-colors mb-2">Why Time Tracking Is the Secret to Better Work-Life Balance</h3>
                        <p class="text-sm text-surface-500 leading-relaxed mb-4">Most people think time tracking is about billing clients. But the real benefit is understanding where your hours actually go.</p>
                        <span class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600">
                            Read more
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </span>
                    </div>
                </article>

                {{-- Post 2 --}}
                <article class="group bg-white rounded-2xl border border-surface-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="aspect-video bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-surface-500 mb-2">
                            <span class="px-2 py-0.5 bg-purple-50 text-purple-700 rounded-full font-medium">Teams</span>
                            <span>&middot;</span>
                            <time>March 20, 2026</time>
                        </div>
                        <h3 class="text-base font-bold text-surface-900 group-hover:text-brand-600 transition-colors mb-2">5 Time Tracking Mistakes Remote Teams Make (And How to Fix Them)</h3>
                        <p class="text-sm text-surface-500 leading-relaxed mb-4">Remote teams often struggle with inconsistent tracking and timezone confusion. Here's how to build better habits.</p>
                        <span class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600">
                            Read more
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </span>
                    </div>
                </article>

                {{-- Post 3 --}}
                <article class="group bg-white rounded-2xl border border-surface-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="aspect-video bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-surface-500 mb-2">
                            <span class="px-2 py-0.5 bg-amber-50 text-amber-700 rounded-full font-medium">Freelancers</span>
                            <span>&middot;</span>
                            <time>March 18, 2026</time>
                        </div>
                        <h3 class="text-base font-bold text-surface-900 group-hover:text-brand-600 transition-colors mb-2">The Freelancer's Guide to Accurate Client Billing</h3>
                        <p class="text-sm text-surface-500 leading-relaxed mb-4">Stop leaving money on the table. Learn how precise time tracking helps freelancers bill confidently and build trust.</p>
                        <span class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600">
                            Read more
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" /></svg>
                        </span>
                    </div>
                </article>
            </div>

            {{-- Newsletter CTA --}}
            <div class="mt-16 bg-surface-50 rounded-2xl border border-surface-200 p-8 sm:p-10 text-center">
                <h2 class="text-xl font-bold text-surface-900 mb-2">Stay in the Loop</h2>
                <p class="text-surface-500 text-sm mb-6 max-w-md mx-auto">Get new articles, product updates, and productivity tips delivered to your inbox. No spam, unsubscribe anytime.</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 max-w-md mx-auto">
                    <a href="/register" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-brand-600 text-white font-semibold rounded-lg hover:bg-brand-700 transition-colors">
                        Create Free Account
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
