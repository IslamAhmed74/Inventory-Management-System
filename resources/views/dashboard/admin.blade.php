@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')

    <div class="flex justify-between grid grid-cols-1 md:grid-cols-4 gap-4 rounded-xl ">

        <div class="bg-blue-300 border border-blue-500 text-blue-700 rounded-xl p-6 shadow">
            <h2 class="text-lg">Products</h2>
            <p class="text-4xl font-bold mt-2">{{ $products }}</p>
        </div>

        <div class="bg-green-300 border border-green-500 text-green-700 rounded-xl p-6 shadow">
            <h2 class="text-lg">Categories</h2>
            <p class="text-4xl font-bold mt-2">{{ $categories }}</p>
        </div>

        <div class="bg-yellow-200 border border-yellow-500 text-yellow-700 rounded-xl p-6 shadow">
            <h2 class="text-lg">Suppliers</h2>
            <p class="text-4xl font-bold mt-2">{{ $suppliers }}</p>
        </div>

        <div class="bg-purple-300 border border-purple-500 text-purple-700 rounded-xl p-6 shadow">
            <h2 class="text-lg">Users</h2>
            <p class="text-4xl font-bold mt-2">{{ $users }}</p>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

        <div class="bg-green-100 border border-green-300 rounded-xl p-6">

            <h2 class="text-green-700  font-semibold">
                Total Stock In
            </h2>

            <p class="text-4xl font-bold mt-2">
                {{ $stockIn }}
            </p>

        </div>

        <div class="bg-red-100 border border-red-300 rounded-xl p-6">

            <h2 class="text-red-700 font-semibold">
                Total Stock Out
            </h2>

            <p class="text-4xl font-bold mt-2">
                {{ $stockOut }}
            </p>

        </div>

        <div class="bg-orange-100 border border-orange-300 rounded-xl p-6">

            <h2 class="text-orange-700 font-semibold">
                Low Stock Products
            </h2>

            <p class="text-4xl font-bold mt-2">
                {{ $lowStock }}
            </p>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow mt-8 shadow-lg rounded-xl border border-slate-200">

        <div class="p-5 border-b">

            <h2 class="text-xl font-bold">
                Recent Stock Movements
            </h2>

        </div>

        <table class="w-full">

            <thead class="bg-gray-300">

                <tr>

                    <th class="p-3 text-left">Product</th>
                    <th class="p-3 text-left">User</th>
                    <th class="p-3 text-left">Type</th>
                    <th class="p-3 text-left">Qty</th>
                    <th class="p-3 text-left">Date</th>

                </tr>

            </thead>

            <tbody>

                @forelse($recentMovements as $movement)
                    <tr class="border-b text-center">

                        <td class="p-3 text-left">
                            {{ $movement->product->name }}
                        </td>

                        <td class="p-3 text-left">
                            {{ $movement->user->name }}
                        </td>

                        <td class="p-3 text-left">

                            @if ($movement->type == 'in')
                                <span class="text-green-600 font-bold">
                                    IN
                                </span>
                            @else
                                <span class="text-red-600 font-bold">
                                    OUT
                                </span>
                            @endif

                        </td>

                        <td class="p-3 text-left">{{ $movement->quantity }}</td>

                        <td class="p-3 text-left">{{ $movement->created_at->format('d/m/Y') }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center p-5">
                            No Data
                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

        <div class="bg-white rounded-xl shadow mt-8">

            <div class="p-5 border-b">

                <h2 class="text-xl font-bold text-red-600">
                    ⚠️ Low Stock Products
                </h2>

            </div>

            <table class="w-full">

                <thead class="bg-gray-300">

                    <tr>

                        <th class="p-3 text-left">Product</th>
                        <th class="p-3 text-left">Current Quantity</th>
                        <th class="p-3 text-left">Minimum Stock</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($lowStockProducts as $product)
                        <tr class="border-b text-center">

                            <td class="p-3 text-left">

                                {{ $product->name }}

                            </td>

                            <td class="p-3 text-left text-red-600 font-bold">

                                {{ $product->quantity }}

                            </td>

                            <td class="p-3 text-left">

                                {{ $product->minimum_stock }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="text-center p-5">

                                🎉 No Low Stock Products

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
