@extends('layouts.admin')

@section('title', 'Products')

@section('content')

    <div class="bg-white rounded-xl shadow p-6">

        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-2xl font-bold">

                Products

            </h2>
            <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Product..."
                    class="border rounded-lg px-4 py-2">

                <button class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">
                    Search
                </button>

                @if (request('search'))
                    <a href="{{ route('products.index') }}" class="bg-gray-500 text-gray px-4 py-2 rounded-lg">
                        Reset
                    </a>
                @endif

            </form>

            <a href="{{ route('products.create') }}" class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">
                + Add Product
            </a>

        </div>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">SKU</th>
                    <th class="p-3 text-left">Category</th>
                    <th class="p-3 text-left">Supplier</th>
                    <th class="p-3 text-left">Purchase</th>
                    <th class="p-3 text-left">Selling</th>
                    <th class="p-3 text-left">Qty</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($products as $product)
                    <tr class="border-b">

                        <td class="p-3">{{ $product->name }}</td>

                        <td class="p-3 text-left" >{{ $product->sku }}</td>

                        <td class="p-3 text-left">{{ $product->category->name }}</td>

                        <td class="p-3 text-left">{{ $product->supplier->name }}</td>

                        <td class="p-3 text-left">{{ $product->purchase_price }}</td>

                        <td class="p-3 text-left">{{ $product->selling_price }}</td>

                        <td class="p-3 text-left">

                            {{ $product->quantity }}

                            @if ($product->quantity <= $product->minimum_stock)
                                <span class="ml-2 px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs">
                                    Low Stock
                                </span>
                            @endif

                        </td>

                        <td class="p-3 text-left">

                            @if ($product->status)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                    Active
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                    Inactive
                                </span>
                            @endif

                        </td>

                        <td class="p-3 flex justify-center gap-4">

                            <a href="{{ route('products.edit', $product) }}"
                                class="bg-yellow-500 text-gray px-3 py-1 rounded-xl">

                                Edit

                            </a>

                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete Product?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded-xl">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center p-5">

                            No Products Found

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

        <div class="mt-6">

            {{ $products->links() }}

        </div>

    </div>

@endsection
