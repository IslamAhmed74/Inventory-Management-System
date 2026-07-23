<x-guest-layout>

    <div class="text-center mb-8">

        <h2 class="text-3xl font-bold text-slate-800">
            Create Account 🚀
        </h2>

        <p class="text-gray-500 mt-2">
            Create your Inventory MS account
        </p>

    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->

        <div>

            <label class="block mb-2 text-sm font-semibold text-gray-700">

                Full Name

            </label>

            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                placeholder="Enter your full name"
                class="w-full rounded-xl border border-gray-300 bg-gray-50 py-3 px-4 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition">

            @error('name')
                <p class="text-red-500 text-sm mt-1">

                    {{ $message }}

                </p>
            @enderror

        </div>

        <!-- Email -->

        <div>

            <label class="block mb-2 text-sm font-semibold text-gray-700">

                Email Address

            </label>

            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email"
                class="w-full rounded-xl border border-gray-300 bg-gray-50 py-3 px-4 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition">

            @error('email')
                <p class="text-red-500 text-sm mt-1">

                    {{ $message }}

                </p>
            @enderror

        </div>

        <!-- Password -->

        <div>

            <label class="block mb-2 text-sm font-semibold text-gray-700">

                Password

            </label>

            <div class="relative">

                <input id="password" type="password" name="password" required placeholder="Enter your password"
                    class="w-full rounded-xl border border-gray-300 bg-gray-50 py-3 px-4 pr-12 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition">

                <button type="button" onclick="togglePassword('password')"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600">

                    👁

                </button>

            </div>

            @error('password')
                <p class="text-red-500 text-sm mt-1">

                    {{ $message }}

                </p>
            @enderror

        </div>

        <!-- Confirm Password -->

        <div>

            <label class="block mb-2 text-sm font-semibold text-gray-700">

                Confirm Password

            </label>

            <div class="relative">

                <input id="password_confirmation" type="password" name="password_confirmation" required
                    placeholder="Confirm your password"
                    class="w-full rounded-xl border border-gray-300 bg-gray-50 py-3 px-4 pr-12 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition">

                <button type="button" onclick="togglePassword('password_confirmation')"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-blue-600">

                    👁

                </button>

            </div>

        </div>

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold shadow-lg transition">

            Create Account

        </button>

        <div class="text-center pt-2">

            <span class="text-gray-600">

                Already have an account?

            </span>

            <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:underline">

                Login

            </a>

        </div>

    </form>

</x-guest-layout>
