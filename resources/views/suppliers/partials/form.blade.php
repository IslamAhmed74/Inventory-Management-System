@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-medium">
            Name
        </label>

        <input type="text" name="name" value="{{ old('name', $supplier->name ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">

        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium text-gray-700 ">
            Email
        </label>

        <input type="email" name="email" value="{{ old('email', $supplier->email ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">

        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Phone
        </label>

        <input type="text" name="phone" value="{{ old('phone', $supplier->phone ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">

        @error('phone')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Address
        </label>

        <input type="text" name="address" value="{{ old('address', $supplier->address ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">

        @error('address')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>
