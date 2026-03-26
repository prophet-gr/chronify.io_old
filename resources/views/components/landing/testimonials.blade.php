<section id="testimonials" class="py-20 sm:py-28 bg-surface-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-16">
            <p class="text-sm font-semibold text-brand-600 uppercase tracking-wide mb-3">Testimonials</p>
            <h2 class="text-3xl sm:text-4xl font-bold text-surface-900 tracking-tight">
                Loved by teams everywhere
            </h2>
            <p class="mt-4 text-lg text-surface-500">
                See what our customers have to say about how Chronify transformed their workflow.
            </p>
        </div>

        {{-- Testimonials Grid --}}
        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            {{-- Testimonial 1 --}}
            <div class="bg-white rounded-2xl border border-surface-200 p-6 shadow-card">
                <div class="flex items-center gap-1 mb-4">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-warning-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
                <blockquote class="text-sm text-surface-600 leading-relaxed mb-6">
                    "Chronify cut our invoicing time in half. We used to spend hours reconciling timesheets — now everything is tracked automatically and reports are just a click away."
                </blockquote>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-brand-100 flex items-center justify-center text-brand-700 font-semibold text-sm">
                        SK
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-surface-900">Sarah Kim</div>
                        <div class="text-xs text-surface-500">Operations Lead, Pixelcraft Studio</div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 2 --}}
            <div class="bg-white rounded-2xl border border-surface-200 p-6 shadow-card">
                <div class="flex items-center gap-1 mb-4">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-warning-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
                <blockquote class="text-sm text-surface-600 leading-relaxed mb-6">
                    "As a freelancer, I needed something simple that just works. Chronify's one-click timer and project tagging are exactly what I was looking for. The free tier is incredibly generous."
                </blockquote>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-success-100 flex items-center justify-center text-success-700 font-semibold text-sm">
                        MR
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-surface-900">Marco Rossi</div>
                        <div class="text-xs text-surface-500">Freelance Developer</div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 3 --}}
            <div class="bg-white rounded-2xl border border-surface-200 p-6 shadow-card">
                <div class="flex items-center gap-1 mb-4">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-warning-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
                <blockquote class="text-sm text-surface-600 leading-relaxed mb-6">
                    "We rolled out Chronify to our 50-person engineering team and adoption was instant. The clean UI and one-click timers mean people actually track their time instead of guessing at the end of the week."
                </blockquote>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-warning-100 flex items-center justify-center text-warning-700 font-semibold text-sm">
                        AT
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-surface-900">Alex Thompson</div>
                        <div class="text-xs text-surface-500">VP Engineering, DataFlow Inc.</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Trust Badges --}}
        <div class="mt-16 text-center">
            <p class="text-sm text-surface-400 mb-6">Trusted by teams at</p>
            <div class="flex flex-wrap items-center justify-center gap-x-10 gap-y-4 opacity-40">
                <span class="text-xl font-bold text-surface-900 tracking-tight">Basecamp</span>
                <span class="text-xl font-bold text-surface-900 tracking-tight">Shopify</span>
                <span class="text-xl font-bold text-surface-900 tracking-tight">Vercel</span>
                <span class="text-xl font-bold text-surface-900 tracking-tight">Linear</span>
                <span class="text-xl font-bold text-surface-900 tracking-tight">Notion</span>
            </div>
        </div>
    </div>
</section>
