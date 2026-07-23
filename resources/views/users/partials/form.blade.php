@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-medium">Name</label>

        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">

        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Email</label>

        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">

        @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Password</label>

        <input type="password" name="password" class="w-full border rounded-lg px-3 py-2">

        @if (isset($user))
            <small class="text-gray-500">
                Leave blank if you don't want to change it.
            </small>
        @endif

        @error('password')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Confirm Password
        </label>

        <input type="password" name="password_confirmation" class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">
            User Type
        </label>

        <select name="type" class="w-full border rounded-lg px-3 py-2">

            <option value="user" {{ old('type', $user->type ?? '') == 'user' ? 'selected' : '' }}>
                User
            </option>

            <option value="admin" {{ old('type', $user->type ?? '') == 'admin' ? 'selected' : '' }}>
                Admin
            </option>

        </select>

        @error('type')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

    </div>

</div>
