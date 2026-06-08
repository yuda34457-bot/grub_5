<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block font-medium text-sm text-white">Alamat Email<span class="text-red-500">*</span></label>
            <input id="email" class="block mt-2 w-full bg-[#3f3f46] border border-transparent rounded-lg text-white focus:border-[#f97316] focus:ring-[#f97316] shadow-sm py-2 px-3" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <label for="password" class="block font-medium text-sm text-white">Kata Sandi<span class="text-red-500">*</span></label>
            <input id="password" class="block mt-2 w-full bg-[#3f3f46] border border-transparent rounded-lg text-white focus:border-[#f97316] focus:ring-[#f97316] shadow-sm py-2 px-3"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-[#3f3f46] border-transparent text-[#f97316] shadow-sm focus:ring-[#f97316]" name="remember">
                <span class="ms-2 text-sm text-gray-300">Ingat Saya</span>
            </label>
        </div>

        <div class="mt-8">
            <button class="w-full justify-center bg-[#f97316] hover:bg-[#ea580c] text-white font-medium py-2.5 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f97316] focus:ring-offset-[#27272a]">
                Sign in
            </button>
        </div>
        
        @if (Route::has('password.request'))
            <div class="mt-6 text-center">
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>
