<nav x-data="{ open: false }" class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-lg border-b border-surface-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="/" class="flex items-center gap-2.5">
                <svg class="w-8 h-8 text-brand-600" fill="none" viewBox="0 0 32 32" stroke="currentColor" stroke-width="2" role="img" aria-label="Chronify logo">
                    <circle cx="16" cy="16" r="13" />
                    <path d="M16 8v8l5.5 3.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="text-xl font-bold text-surface-900">Chronify</span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="#features" class="text-sm font-medium text-surface-600 hover:text-surface-900 transition-colors">Features</a>
                <a href="#how-it-works" class="text-sm font-medium text-surface-600 hover:text-surface-900 transition-colors">How It Works</a>
                <a href="#pricing" class="text-sm font-medium text-surface-600 hover:text-surface-900 transition-colors">Pricing</a>
                <a href="#testimonials" class="text-sm font-medium text-surface-600 hover:text-surface-900 transition-colors">Testimonials</a>
            </div>

            {{-- Desktop CTA --}}
            <div class="hidden md:flex items-center gap-3">
                <a href="/api/login" class="text-sm font-medium text-surface-600 hover:text-surface-900 transition-colors">Sign In</a>
                <a href="/api/register" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-colors">
                    Start Free Trial
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="open = !open" class="md:hidden p-2 rounded-lg text-surface-500 hover:bg-surface-100" aria-label="Toggle menu">
                <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="md:hidden border-t border-surface-200 bg-white">
        <div class="px-4 py-4 space-y-3">
            <a href="#features" @click="open = false" class="block text-sm font-medium text-surface-600 hover:text-surface-900">Features</a>
            <a href="#how-it-works" @click="open = false" class="block text-sm font-medium text-surface-600 hover:text-surface-900">How It Works</a>
            <a href="#pricing" @click="open = false" class="block text-sm font-medium text-surface-600 hover:text-surface-900">Pricing</a>
            <a href="#testimonials" @click="open = false" class="block text-sm font-medium text-surface-600 hover:text-surface-900">Testimonials</a>
            <hr class="border-surface-200">
            <a href="/api/login" class="block text-sm font-medium text-surface-600 hover:text-surface-900">Sign In</a>
            <a href="/api/register" class="block w-full text-center px-4 py-2.5 text-sm font-medium text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-colors">
                Start Free Trial
            </a>
        </div>
    </div>
</nav>
