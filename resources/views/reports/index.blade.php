@extends('layouts.admin')

@section('title', 'Reports')

@section('content')

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-2xl font-bold mb-6">
            Inventory Reports
        </h2>

        {{-- Filter Form --}}
        <form method="GET" action="{{ route('reports.index') }}">

            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

                <div>
                    <label class="block mb-1">Product</label>

                    <select name="product" class="w-full border rounded-lg px-3 py-2">

                        <option value="">All</option>

                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ request('product') == $product->id ? 'selected' : '' }}>

                                {{ $product->name }}

                            </option>
                        @endforeach

                    </select>
                </div>

                <div>

                    <label class="block mb-1">User</label>

                    <select name="user" class="w-full border rounded-lg px-3 py-2">

                        <option value="">All</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ request('user') == $user->id ? 'selected' : '' }}>

                                {{ $user->name }}

                            </option>
                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-1">Type</label>

                    <select name="type" class="w-full border rounded-lg px-3 py-2">

                        <option value="">All</option>

                        <option value="in" {{ request('type') == 'in' ? 'selected' : '' }}>
                            Stock In
                        </option>

                        <option value="out" {{ request('type') == 'out' ? 'selected' : '' }}>
                            Stock Out
                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-1">From</label>

                    <input type="date" name="from" value="{{ request('from') }}"
                        class="w-full border rounded-lg px-3 py-2">

                </div>

                <div>

                    <label class="block mb-1">To</label>

                    <input type="date" name="to" value="{{ request('to') }}"
                        class="w-full border rounded-lg px-3 py-2">

                </div>

            </div>

            <div class="mt-5 flex gap-3">

                <button class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">

                    Filter

                </button>

                <a href="{{ route('reports.index') }}" class="bg-gray-500 text-white px-5 py-2 rounded-lg">

                    Reset

                </a>

            </div>

        </form>

    </div>

    {{-- Summary Cards --}}

    <div class="grid grid-cols-2 gap-6 mt-6">

        <div class="bg-green-100 rounded-xl p-6">

            <h3 class="text-gray-600">
                Total Stock In
            </h3>

            <p class="text-4xl font-bold text-green-700 mt-2">

                {{ $totalIn }}

            </p>

        </div>

        <div class="bg-red-100 rounded-xl p-6">

            <h3 class="text-gray-600">
                Total Stock Out
            </h3>

            <p class="text-4xl font-bold text-red-700 mt-2">

                {{ $totalOut }}

            </p>

        </div>

    </div>
    <br>
    <form method="GET" action="{{ route('reports.index') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">

        <select name="product_id" class="border rounded-lg px-3 py-2">

            <option value="">All Products</option>

            @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>

                    {{ $product->name }}

                </option>
            @endforeach

        </select>

        <select name="type" class="border rounded-lg px-3 py-2">

            <option value="">All Types</option>

            <option value="in" {{ request('type') == 'in' ? 'selected' : '' }}>

                Stock In

            </option>

            <option value="out" {{ request('type') == 'out' ? 'selected' : '' }}>

                Stock Out

            </option>

        </select>

        <input type="date" name="from_date" value="{{ request('from_date') }}" class="border rounded-lg px-3 py-2">

        <input type="date" name="to_date" value="{{ request('to_date') }}" class="border rounded-lg px-3 py-2">

        <div class="flex gap-2">

            <button class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">

                Filter

            </button>

            <a href="{{ route('reports.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">

                Reset

            </a>

        </div>

    </form>
    {{-- Table --}}

    <div class="bg-white rounded-xl shadow mt-6 p-6">

        <table class="w-full">

            <thead class="bg-gray-300">

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

                        <td class="p-3 text-left">

                            {{ $movement->product->name }}

                        </td>

                        <td class="p-3 text-left">

                            {{ $movement->user->name }}

                        </td>

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

                        </td>

                        <td class="p-3 text-left">

                            {{ $movement->quantity }}

                        </td>

                        <td class="p-3 text-left">

                            {{ $movement->note }}

                        </td>

                        <td class="p-3 text-left">

                            {{ $movement->created_at->format('d/m/Y H:i') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center p-5">

                            No Records Found

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

        <br>

        <a href="{{ route('reports.pdf', request()->query()) }}"
            class="bg-red-400 hover:bg-red-500 text-black px-4 py-2 rounded-lg">

            Export PDF

        </a>
        <div class="mt-6">

            {{ $movements->links() }}

        </div>

    </div>

@endsection
