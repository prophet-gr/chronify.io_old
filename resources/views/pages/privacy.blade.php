<x-layouts.landing title="Privacy Policy — Chronify">
    <x-landing.navbar />

    <section class="pt-32 pb-20 sm:pt-40 sm:pb-28">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-surface-900 tracking-tight mb-2">Privacy Policy</h1>
            <p class="text-sm text-surface-500 mb-10">Last updated: {{ date('F j, Y') }}</p>

            <div class="prose prose-surface max-w-none text-surface-600 space-y-6">
                <p>
                    At Chronify, we take your privacy seriously. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our platform.
                </p>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Information We Collect</h2>
                <p>We collect information you provide directly to us, including:</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Account information (name, email address, password)</li>
                    <li>Time tracking data (time entries, projects, tasks)</li>
                    <li>Organization and team information</li>
                    <li>Payment and billing information (processed securely by our payment provider)</li>
                    <li>Communications you send to us</li>
                </ul>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">How We Use Your Information</h2>
                <p>We use the information we collect to:</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Provide, maintain, and improve our services</li>
                    <li>Process transactions and send related information</li>
                    <li>Send technical notices, updates, and support messages</li>
                    <li>Respond to your comments, questions, and requests</li>
                    <li>Monitor and analyze trends, usage, and activities</li>
                </ul>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Data Security</h2>
                <p>
                    We implement appropriate technical and organizational measures to protect your personal data against unauthorized access, alteration, disclosure, or destruction.
                </p>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Contact Us</h2>
                <p>
                    If you have questions about this Privacy Policy, please contact us at
                    <a href="mailto:privacy@chronify.io" class="text-brand-600 hover:text-brand-700 font-medium">privacy@chronify.io</a>.
                </p>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
