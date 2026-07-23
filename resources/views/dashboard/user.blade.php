@extends('layouts.admin')
@section('title' , 'User Dashboard')
@section('content')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-blue-600 text-white rounded-xl p-6 shadow">

        <h2>Total Products</h2>

        <p class="text-4xl font-bold mt-2">
            {{ $products }}
        </p>

    </div>

    <div class="bg-green-600 text-white rounded-xl p-6 shadow">

        <h2>My Stock In</h2>

        <p class="text-4xl font-bold mt-2">
            {{ $stockIn }}
        </p>

    </div>

    <div class="bg-gray-600 text-white rounded-xl p-6 shadow">

        <h2>My Stock Out</h2>

        <p class="text-4xl font-bold mt-2">
            {{ $stockOut }}
        </p>

    </div>

</div>

<div class="bg-white rounded-xl shadow mt-8">

    <div class="p-5 border-b">

        <h2 class="text-xl font-bold">
            My Recent Movements
        </h2>

    </div>

    <table class="w-full">

        <thead class="bg-gray-300">

            <tr>

                <th class="p-3">Product</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Date</th>

            </tr>

        </thead>

        <tbody>

            @forelse($recentMovements as $movement)

                <tr class="border-b text-center p-5">

                    <td class="p-3 bg-gray-100">
                        {{ $movement->product->name }}
                    </td>

                    <td>

                        @if($movement->type=='in')

                            <span class="text-green-600 font-bold">
                                IN
                            </span>

                        @else

                            <span class="text-red-600 font-bold">
                                OUT
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ $movement->quantity }}
                    </td>

                    <td>
                        {{ $movement->created_at->format('d/m/Y') }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center p-5">

                        No Data

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
