<x-layouts.guest title="Sign In">
    <div class="bg-white rounded-2xl border border-surface-200 shadow-xl shadow-surface-900/5 p-8">
        <h2 class="text-2xl font-bold text-surface-900 text-center mb-2">Welcome back</h2>
        <p class="text-sm text-surface-500 text-center mb-8">Sign in to your Chronify account</p>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <x-ui.input
                id="email"
                name="email"
                type="email"
                label="Email address"
                placeholder="you@example.com"
                :value="old('email')"
                :error="$errors->first('email')"
                required
                autofocus
            />

            <x-ui.input
                id="password"
                name="password"
                type="password"
                label="Password"
                placeholder="Enter your password"
                :error="$errors->first('password')"
                required
            />

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-surface-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-sm text-surface-600">Remember me</span>
                </label>
            </div>

            <x-ui.button type="submit" variant="primary" size="lg" class="w-full justify-center">
                Sign In
            </x-ui.button>
        </form>
    </div>

    <p class="text-center text-sm text-surface-500 mt-6">
        Don't have an account?
        <a href="{{ route('register') }}" class="font-medium text-brand-600 hover:text-brand-700">Start your free trial</a>
    </p>
</x-layouts.guest>
