<x-layouts.landing title="Cookie Policy — Chronify">
    <x-landing.navbar />

    <section class="pt-32 pb-20 sm:pt-40 sm:pb-28">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-surface-900 tracking-tight mb-2">Cookie Policy</h1>
            <p class="text-sm text-surface-500 mb-10">Last updated: {{ date('F j, Y') }}</p>

            <div class="prose prose-surface max-w-none text-surface-600 space-y-6">
                <p>
                    This Cookie Policy explains how Chronify uses cookies and similar technologies when you visit our website or use our platform.
                </p>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">What Are Cookies?</h2>
                <p>
                    Cookies are small text files stored on your device when you visit a website. They help the site remember your preferences and improve your experience.
                </p>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Cookies We Use</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li><strong>Essential cookies:</strong> Required for the platform to function (authentication, session management, CSRF protection).</li>
                    <li><strong>Analytics cookies:</strong> Help us understand how visitors interact with our site so we can improve it.</li>
                    <li><strong>Preference cookies:</strong> Remember your settings and choices (e.g., timezone, theme).</li>
                </ul>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Managing Cookies</h2>
                <p>
                    You can control and manage cookies through your browser settings. Please note that disabling essential cookies may affect the functionality of the platform.
                </p>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Contact</h2>
                <p>
                    If you have questions about our use of cookies, please contact us at
                    <a href="mailto:privacy@chronify.io" class="text-brand-600 hover:text-brand-700 font-medium">privacy@chronify.io</a>.
                </p>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
