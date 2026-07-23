@csrf

<div>

    <div>
        <label class="block mb-2 font-medium">
            Name
        </label>

        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">

        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Description</label>

        <textarea name="description" rows="4" class="w-full border rounded-lg px-3 py-2">{{ old('description', $category->description ?? '') }}</textarea>
    </div>


</div>
