@extends('layouts.admin')

@section('title', 'Suppliers')

@section('content')

    <div class="bg-white rounded-lg shadow">

        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-2xl font-bold">

                Suppliers

            </h2>
            <form action="{{ route('suppliers.index') }}" method="GET" class="flex gap-2">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Supplier..."
                    class="border rounded-lg px-4 py-2">

                <button class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">
                    Search
                </button>

                @if (request('search'))
                    <a href="{{ route('suppliers.index') }}" class="bg-gray-500 text-gray px-4 py-2 rounded-lg">
                        Reset
                    </a>
                @endif

            </form>

            <a href="{{ route('suppliers.create') }}" class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">
                + Add Supplier
            </a>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Phone</th>
                        <th class="p-3 text-left">Address</th>
                        <th class="p-3 text-center"">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @forelse($suppliers as $supplier)
                        <tr>
                            <td class="p-3 text-left">{{ $supplier->name }}</td>
                            <td class="p-3 text-left">{{ $supplier->email ?? '-' }}</td>
                            <td class="p-3 text-left">{{ $supplier->phone }}</td>
                            <td class="p-3 text-left">{{ $supplier->address ?? '-' }}</td>

                            <td class="p-3 text-center">

                                <div class="flex justify-center gap-4">

                                    <a href="{{ route('suppliers.edit', $supplier) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded-lg text-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST"
                                        onsubmit="return confirm('Delete this supplier?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                No suppliers found.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

        <div class="p-6 border-t">
            {{ $suppliers->links() }}
        </div>

    </div>

@endsection
