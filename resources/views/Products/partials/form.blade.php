@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-medium">Product Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">

        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">SKU</label>
        <input type="text" name="sku" value="{{ old('sku', $product->sku ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">

        @error('sku')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Category</label>

        <select name="category_id" class="w-full border rounded-lg px-3 py-2">
            <option value="">Select Category</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach

        </select>

        @error('category_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Supplier</label>

        <select name="supplier_id" class="w-full border rounded-lg px-3 py-2">
            <option value="">Select Supplier</option>

            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}"
                    {{ old('supplier_id', $product->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach

        </select>

        @error('supplier_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Purchase Price</label>
        <input type="number" step="0.01" name="purchase_price"
            value="{{ old('purchase_price', $product->purchase_price ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Selling Price</label>
        <input type="number" step="0.01" name="selling_price"
            value="{{ old('selling_price', $product->selling_price ?? '') }}"
            class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Quantity</label>
        <input type="number" name="quantity" value="{{ old('quantity', $product->quantity ?? 0) }}"
            class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Minimum Stock</label>
        <input type="number" name="minimum_stock" value="{{ old('minimum_stock', $product->minimum_stock ?? 0) }}"
            class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Status</label>

        <select name="status" class="w-full border rounded-lg px-3 py-2">

            <option value="1" {{ old('status', $product->status ?? '') == 'active' ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ old('status', $product->status ?? '') == 'inactive' ? 'selected' : '' }}>
                Inactive
            </option>

        </select>

    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Description</label>

        <textarea name="description" rows="4" class="w-full border rounded-lg px-3 py-2">{{ old('description', $product->description ?? '') }}</textarea>
    </div>

</div>


