@extends('layouts.admin')

@section('title', 'Stock Movement')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <h2 class="text-2xl font-bold mb-6">
        New Stock Movement
    </h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('stock-movements.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-medium">Product</label>

                <select name="product_id" class="w-full border rounded-lg px-3 py-2">
                    <option value="">Select Product</option>

                    @foreach($products as $product)
                        <option value="{{ $product->id }}"
                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                            (Available: {{ $product->quantity }})
                        </option>
                    @endforeach
                </select>

                @error('product_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 font-medium">Movement Type</label>

                <div class="flex gap-6 mt-2">

                    <label>
                        <input type="radio"
                               name="type"
                               value="in"
                               {{ old('type','in') == 'in' ? 'checked' : '' }}>
                        Stock In
                    </label>

                    <label>
                        <input type="radio"
                               name="type"
                               value="out"
                               {{ old('type') == 'out' ? 'checked' : '' }}>
                        Stock Out
                    </label>

                </div>

                @error('type')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 font-medium">Quantity</label>

                <input
                    type="number"
                    name="quantity"
                    min="1"
                    value="{{ old('quantity') }}"
                    class="w-full border rounded-lg px-3 py-2">

                @error('quantity')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 font-medium">Note</label>

                <input
                    type="text"
                    name="note"
                    value="{{ old('note') }}"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

        </div>

        <div class="mt-6">

            <button
                class="bg-blue-600 hover:bg-blue-700 text-gray px-6 py-2 rounded-lg">

                Save Movement

            </button>

        </div>

    </form>

</div>

@endsection
