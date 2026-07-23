@extends('layouts.admin')

@section('title', 'Categories')

@section('content')

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Categories
            </h2>

            <a href="{{ route('categories.create') }}" class="bg-red-100 hover:bg-blue-700 text-black px-4 py-5 rounded">
                + Add Category
            </a>
        </div>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-300 text-green-700 p-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search -->

            <div class="bg-white rounded-lg shadow">

        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-2xl font-bold">

                Categories

            </h2>
            <form action="{{ route('categories.index') }}" method="GET" class="flex gap-2">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Category..."
                    class="border rounded-lg px-4 py-2">

                <button class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">
                    Search
                </button>

                @if (request('search'))
                    <a href="{{ route('categories.index') }}" class="bg-gray-500 text-gray px-4 py-2 rounded-lg">
                        Reset
                    </a>
                @endif

            </form>

            <a href="{{ route('categories.create') }}" class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">
                + Add Category
            </a>

        </div>



            <div class="bg-white shadow rounded">

                <table class="min-w-full">

                    <thead class="bg-gray-200">

                        <tr>

                            <th class="p-3 text-left">Name</th>

                            <th class="p-3 text-left">Description</th>

                            <th class="p-3 text-left">Created</th>

                            <th class="p-3 text-center">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $category)
                            <tr class="border-t">



                                <td class="p-3">
                                    {{ $category->name }}
                                </td>

                                <td class="p-3">
                                    {{ $category->description }}
                                </td>

                                <td class="p-3">
                                    {{ $category->created_at->format('d M Y') }}
                                </td>

                                <td class="p-3">

                                    <div class="flex justify-center gap-4">

                                        <a href="{{ route('categories.edit', $category) }}"
                                            class="bg-yellow-500 text-red px-3 py-1 rounded-xl">
                                            Edit
                                        </a>

                                        <form action="{{ route('categories.destroy', $category) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Delete this category?')"
                                                class="bg-red-600 text-white px-3 py-1 rounded-xl">

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center p-5">

                                    No categories found.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-5">

                {{ $categories->links() }}

            </div>

        </div>

    </div>

@endsection
