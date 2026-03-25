<x-layouts.landing title="GDPR — Chronify">
    <x-landing.navbar />

    <section class="pt-32 pb-20 sm:pt-40 sm:pb-28">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-surface-900 tracking-tight mb-2">GDPR Compliance</h1>
            <p class="text-sm text-surface-500 mb-10">Last updated: {{ date('F j, Y') }}</p>

            <div class="prose prose-surface max-w-none text-surface-600 space-y-6">
                <p>
                    Chronify is committed to complying with the General Data Protection Regulation (GDPR). This page outlines your rights and how we protect your personal data.
                </p>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Your Rights</h2>
                <p>Under GDPR, you have the right to:</p>
                <ul class="list-disc list-inside space-y-2">
                    <li><strong>Access:</strong> Request a copy of your personal data.</li>
                    <li><strong>Rectification:</strong> Request correction of inaccurate personal data.</li>
                    <li><strong>Erasure:</strong> Request deletion of your personal data ("right to be forgotten").</li>
                    <li><strong>Portability:</strong> Receive your data in a structured, machine-readable format.</li>
                    <li><strong>Restriction:</strong> Request restriction of processing of your personal data.</li>
                    <li><strong>Objection:</strong> Object to processing of your personal data.</li>
                </ul>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Data Processing</h2>
                <p>
                    We process personal data based on your consent, contractual necessity, and our legitimate interests. We only collect data that is necessary for providing our services.
                </p>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Data Retention</h2>
                <p>
                    We retain your personal data only for as long as necessary to provide our services and comply with legal obligations. When you delete your account, we remove your personal data within 30 days.
                </p>

                <h2 class="text-2xl font-bold text-surface-900 mt-10">Data Protection Officer</h2>
                <p>
                    For GDPR-related inquiries, contact our Data Protection Officer at
                    <a href="mailto:dpo@chronify.io" class="text-brand-600 hover:text-brand-700 font-medium">dpo@chronify.io</a>.
                </p>
            </div>
        </div>
    </section>

    <x-landing.footer />
</x-layouts.landing>
