<x-guest-layout>

<div class="text-center mb-8">

    <h2 class="text-3xl font-bold text-slate-800">
        Welcome Back 👋
    </h2>

    <p class="text-gray-500 mt-2">
        Login to continue
    </p>

</div>

<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}" class="space-y-5">
@csrf

<!-- Email -->

<div>

<label class="block mb-2 text-sm font-semibold text-gray-700">

Email Address

</label>

<div class="relative">

<svg xmlns="http://www.w3.org/2000/svg"
class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M16 12H8m8 0L12 16m4-4L12 8"/>

</svg>

<input
type="email"
name="email"
value="{{ old('email') }}"
required
autofocus
placeholder="Enter your email"
class="w-full rounded-xl border border-gray-300 bg-gray-50 py-3 pl-12 pr-4 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition">

</div>

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

<svg xmlns="http://www.w3.org/2000/svg"
class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M5 11V9a7 7 0 1114 0v2"/>

<rect x="4" y="11" width="16" height="9" rx="2"/>

</svg>

<input
id="password"
type="password"
name="password"
required
placeholder="Enter your password"
class="w-full rounded-xl border border-gray-300 bg-gray-50 py-3 pl-12 pr-12 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition">

<button
type="button"
onclick="togglePassword('password')"
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

<div class="flex justify-between items-center">

<label class="flex items-center gap-2">

<input
type="checkbox"
name="remember"
class="rounded border-gray-300 text-blue-600">

<span class="text-sm text-gray-600">

Remember me

</span>

</label>

@if(Route::has('password.request'))

<a
href="{{ route('password.request') }}"
class="text-sm text-blue-600 hover:underline">

Forgot Password?

</a>

@endif

</div>

<button
type="submit"
class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold shadow-lg transition">

Login

</button>

<div class="text-center pt-4">

<span class="text-gray-600">

Don't have an account?

</span>

<a
href="{{ route('register') }}"
class="font-semibold text-blue-600 hover:underline">

Register

</a>

</div>

</form>

</x-guest-layout>
