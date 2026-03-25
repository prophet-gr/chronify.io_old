<x-layouts.landing title="Contact — Chronify">
    <x-landing.navbar />

    <section class="pt-32 pb-20 sm:pt-40 sm:pb-28">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-surface-900 tracking-tight mb-4">Get in Touch</h1>
                <p class="text-lg text-surface-500 max-w-xl mx-auto">
                    Have a question, want to discuss enterprise pricing, or just want to say hello? Fill out the form below and we'll get back to you within 24 hours.
                </p>
            </div>

            @if (session('success'))
                <div class="mb-8 rounded-xl bg-success-50 border border-success-200 p-4">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-success-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm font-medium text-success-800">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <form method="POST" action="/contact" class="space-y-6">
                @csrf

                <div class="grid sm:grid-cols-2 gap-6">
                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-surface-700 mb-1.5">Name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="w-full rounded-xl border border-surface-300 px-4 py-2.5 text-sm text-surface-900 placeholder-surface-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-colors"
                            placeholder="Your full name">
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-surface-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full rounded-xl border border-surface-300 px-4 py-2.5 text-sm text-surface-900 placeholder-surface-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-colors"
                            placeholder="you@company.com">
                        @error('email')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    {{-- Company --}}
                    <div>
                        <label for="company" class="block text-sm font-medium text-surface-700 mb-1.5">Company</label>
                        <input type="text" id="company" name="company" value="{{ old('company') }}"
                            class="w-full rounded-xl border border-surface-300 px-4 py-2.5 text-sm text-surface-900 placeholder-surface-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-colors"
                            placeholder="Your company name">
                        @error('company')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Subject --}}
                    <div>
                        <label for="subject" class="block text-sm font-medium text-surface-700 mb-1.5">Subject <span class="text-red-500">*</span></label>
                        <select id="subject" name="subject" required
                            class="w-full rounded-xl border border-surface-300 px-4 py-2.5 text-sm text-surface-900 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-colors">
                            @php $selectedSubject = old('subject', $preselectedSubject ?? '') @endphp
                            <option value="" disabled {{ $selectedSubject ? '' : 'selected' }}>Select a topic</option>
                            <option value="general" {{ $selectedSubject === 'general' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="sales" {{ $selectedSubject === 'sales' ? 'selected' : '' }}>Sales & Pricing</option>
                            <option value="support" {{ $selectedSubject === 'support' ? 'selected' : '' }}>Support</option>
                            <option value="partnership" {{ $selectedSubject === 'partnership' ? 'selected' : '' }}>Partnership</option>
                        </select>
                        @error('subject')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Message --}}
                <div>
                    <label for="message" class="block text-sm font-medium text-surface-700 mb-1.5">Message <span class="text-red-500">*</span></label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full rounded-xl border border-surface-300 px-4 py-2.5 text-sm text-surface-900 placeholder-surface-400 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 transition-colors resize-y"
                        placeholder="Tell us how we can help...">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <div>
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 rounded-xl shadow-lg shadow-brand-500/25 transition-all hover:shadow-xl">
                        Send Message
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </form>

            {{-- Additional Contact Info --}}
            <div class="mt-16 pt-12 border-t border-surface-200">
                <div class="grid sm:grid-cols-3 gap-8 text-center">
                    <div>
                        <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-surface-900 mb-1">Email</h3>
                        <a href="mailto:hello@chronify.io" class="text-sm text-brand-600 hover:text-brand-700">hello@chronify.io</a>
                    </div>
                    <div>
                        <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-surface-900 mb-1">Sales</h3>
                        <a href="mailto:sales@chronify.io" class="text-sm text-brand-600 hover:text-brand-700">sales@chronify.io</a>
                    </div>
                    <div>
                        <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-surface-900 mb-1">Support</h3>
                        <a href="mailto:support@chronify.io" class="text-sm text-brand-600 hover:text-brand-700">support@chronify.io</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
