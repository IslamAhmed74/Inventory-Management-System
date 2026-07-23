@extends('layouts.admin')

@section('title', 'Stock Movements')

@section('content')

    <div class="bg-white rounded-xl shadow p-6">

        <div class="flex justify-between mb-6">

            <h2 class="text-2xl font-bold">
                Stock Movements
            </h2>

            <a href="{{ route('stock-movements.create') }}" class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">

                + New Movement

            </a>

        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">Product</th>
                    <th class="p-3 text-left">User</th>
                    <th class="p-3 text-left">Type</th>
                    <th class="p-3 text-left">Quantity</th>
                    <th class="p-3 text-left">Note</th>
                    <th class="p-3 text-left">Date</th>

                </tr>

            </thead>

            <tbody>

                @forelse($movements as $movement)
                    <tr class="border-b text-center">

                        <td class="p-3 text-left">{{ $movement->product->name }}</td>

                        <td class="p-3 text-left">{{ $movement->user->name }}</td>

                        <td class="p-3 text-left">
                            @if ($movement->type == 'in')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                    IN
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                    OUT
                                </span>
                            @endif
                        </td class="p-3 text-left">

                        <td class="p-3 text-left">{{ $movement->quantity }}</td>

                        <td class="p-3 text-left">{{ $movement->note }}</td>

                        <td class="p-3 text-left">{{ $movement->created_at->format('d/m/Y H:i') }}</td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center p-4">
                            No stock movements found.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

        <div class="mt-6">
            {{ $movements->links() }}
        </div>

    </div>

@endsection
