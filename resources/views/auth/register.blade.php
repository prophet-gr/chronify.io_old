<x-layouts.guest title="Start Free Trial">
    <div class="bg-white rounded-2xl border border-surface-200 shadow-xl shadow-surface-900/5 p-8">
        <h2 class="text-2xl font-bold text-surface-900 text-center mb-2">Start your free trial</h2>
        <p class="text-sm text-surface-500 text-center mb-8">14 days free on the Pro plan. No credit card required.</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <x-ui.input
                id="name"
                name="name"
                type="text"
                label="Full name"
                placeholder="John Doe"
                :value="old('name')"
                :error="$errors->first('name')"
                required
                autofocus
            />

            <x-ui.input
                id="email"
                name="email"
                type="email"
                label="Email address"
                placeholder="you@example.com"
                :value="old('email')"
                :error="$errors->first('email')"
                required
            />

            <x-ui.input
                id="password"
                name="password"
                type="password"
                label="Password"
                placeholder="Create a password"
                :error="$errors->first('password')"
                required
            />

            <x-ui.input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                label="Confirm password"
                placeholder="Confirm your password"
                required
            />

            <input type="hidden" name="timezone" id="timezone">

            <x-ui.button type="submit" variant="primary" size="lg" class="w-full justify-center">
                Create Account
            </x-ui.button>
        </form>
    </div>

    <p class="text-center text-sm text-surface-500 mt-6">
        Already have an account?
        <a href="{{ route('login') }}" class="font-medium text-brand-600 hover:text-brand-700">Sign in</a>
    </p>

    <script>
        document.getElementById('timezone').value = Intl.DateTimeFormat().resolvedOptions().timeZone;
    </script>
</x-layouts.guest>
