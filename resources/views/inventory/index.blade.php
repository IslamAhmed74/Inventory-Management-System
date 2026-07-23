
@extends('layouts.admin')

@section('title','Inventory')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Inventory
        </h2>
        <form action="{{ route('inventory.index') }}" method="GET" class="flex gap-2">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Product..."
                    class="border rounded-lg px-4 py-2">

                <button class="bg-blue-600 text-gray px-4 rounded-lg">
                    Search
                </button>

                @if (request('search'))
                    <a href="{{ route('inventory.index') }}" class="bg-gray-500 text-gray px-4 py-2 rounded-lg">
                        Reset
                    </a>
                @endif

            </form>

    </div>

    <table class="w-full">

        <thead class="bg-gray-300">

        <tr>

            <th class="p-3 text-left">Name</th>
            <th class="p-3 text-left">SKU</th>
            <th class="p-3 text-left">Category</th>
            <th class="p-3 text-left">Supplier</th>
            <th class="p-3 text-left">Quantity</th>
            <th class="p-3 text-left">Status</th>

        </tr>

        </thead>

        <tbody>

        @forelse($products as $product)

            <tr class="border-b text-center p-5">

                <td class="p-3 text-left">
                    {{ $product->name }}
                </td>

                <td class="p-3 text-left">
                    {{ $product->sku }}
                </td>

                <td class="p-3 text-left">
                    {{ $product->category->name ?? '-' }}
                </td>

                <td class="p-3 text-left">
                    {{ $product->supplier->name ?? '-' }}
                </td>

                <td class="p-3 text-left">

                    {{ $product->quantity }}

                    @if($product->quantity <= $product->minimum_stock)

                        <span class="ml-2 px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                            Low Stock
                        </span>

                    @endif

                </td>

                <td class="p-3 text-left">

                    @if($product->status)

                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                            Active
                        </span>

                    @else

                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
                            Inactive
                        </span>

                    @endif

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center p-5">

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
