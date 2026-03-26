<x-layouts.landing title="About — Chronify">
    <x-landing.navbar />

    {{-- Hero --}}
    <section class="relative pt-32 pb-16 sm:pt-40 sm:pb-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-brand-50/40 via-white to-white"></div>
        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm font-semibold text-brand-600 uppercase tracking-wide mb-3">About Us</p>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-surface-900 tracking-tight mb-6">We believe time is your most valuable resource</h1>
            <p class="text-lg text-surface-500 leading-relaxed max-w-2xl mx-auto">
                Chronify was born from a simple frustration: existing time trackers felt like a chore. We set out to build something that gets out of your way — so you can focus on the work that matters.
            </p>
        </div>
    </section>

    {{-- Our Story --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-2xl font-bold text-surface-900 mb-4">Our Story</h2>
                    <div class="space-y-4 text-surface-600 leading-relaxed">
                        <p>
                            We started Chronify after years of working with clunky timesheets and bloated enterprise software. Every tool we tried was either too complex for small teams or too simple for real work.
                        </p>
                        <p>
                            So we built what we wished existed: a time tracker that's powerful enough for a 100-person agency, yet simple enough that a solo freelancer can set it up in under a minute.
                        </p>
                        <p>
                            Today, Chronify helps thousands of professionals take control of their time — from independent designers to growing engineering teams. We're just getting started.
                        </p>
                    </div>
                </div>
                <div class="bg-surface-50 rounded-2xl p-8 border border-surface-200">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-brand-600">2026</div>
                            <div class="text-sm text-surface-500 mt-1">Founded</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-brand-600">5K+</div>
                            <div class="text-sm text-surface-500 mt-1">Active Teams</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-brand-600">2M+</div>
                            <div class="text-sm text-surface-500 mt-1">Hours Tracked</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-brand-600">99.9%</div>
                            <div class="text-sm text-surface-500 mt-1">Uptime</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="py-16 sm:py-20 bg-surface-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-bold text-surface-900 mb-3">What We Stand For</h2>
                <p class="text-surface-500 max-w-xl mx-auto">The principles that guide every decision we make — from product design to customer support.</p>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl border border-surface-200 p-6">
                    <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="font-semibold text-surface-900 mb-2">Simplicity First</h3>
                    <p class="text-sm text-surface-600 leading-relaxed">Every feature must earn its place. If it adds complexity without clear value, it doesn't ship. We'd rather do fewer things exceptionally well.</p>
                </div>

                <div class="bg-white rounded-2xl border border-surface-200 p-6">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="font-semibold text-surface-900 mb-2">Privacy by Default</h3>
                    <p class="text-sm text-surface-600 leading-relaxed">Your time data is sensitive. We encrypt everything, never sell your data, and give you full control over what you share and with whom.</p>
                </div>

                <div class="bg-white rounded-2xl border border-surface-200 p-6">
                    <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round" /></svg>
                    </div>
                    <h3 class="font-semibold text-surface-900 mb-2">Built for Real Teams</h3>
                    <p class="text-sm text-surface-600 leading-relaxed">We design for the way people actually work — not how project management textbooks say they should. Real teams are messy, and that's okay.</p>
                </div>

                <div class="bg-white rounded-2xl border border-surface-200 p-6">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" stroke-linecap="round" stroke-linejoin="round" /><circle cx="12" cy="12" r="9" /></svg>
                    </div>
                    <h3 class="font-semibold text-surface-900 mb-2">Transparent & Fair</h3>
                    <p class="text-sm text-surface-600 leading-relaxed">Simple pricing with no hidden fees. A generous free tier that actually lets you get work done. We succeed when you succeed.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- What We Offer --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-surface-900 mb-6">What We Offer</h2>
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-brand-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    <span class="text-sm text-surface-600">One-click time tracking with real-time timers</span>
                </div>
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-brand-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    <span class="text-sm text-surface-600">Project and task management with team collaboration</span>
                </div>
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-brand-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    <span class="text-sm text-surface-600">Detailed reports and exportable timesheets</span>
                </div>
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-brand-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    <span class="text-sm text-surface-600">Integrations with tools you already use</span>
                </div>
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-brand-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    <span class="text-sm text-surface-600">Native mobile apps for iOS and Android</span>
                </div>
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-brand-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    <span class="text-sm text-surface-600">GDPR-compliant with EU data hosting</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact CTA --}}
    <section class="py-16 sm:py-20 bg-surface-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-surface-900 mb-3">Get in Touch</h2>
            <p class="text-surface-600 mb-6 max-w-lg mx-auto">
                Have questions, feedback, or partnership ideas? We'd love to hear from you.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/contact" class="inline-flex items-center gap-2 px-6 py-3 bg-brand-600 text-white font-semibold rounded-lg hover:bg-brand-700 transition-colors">
                    Contact Us
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" /></svg>
                </a>
                <a href="mailto:hello@chronify.io" class="inline-flex items-center gap-2 px-6 py-3 text-surface-700 bg-white border border-surface-300 font-semibold rounded-lg hover:bg-surface-50 transition-colors">
                    hello@chronify.io
                </a>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
