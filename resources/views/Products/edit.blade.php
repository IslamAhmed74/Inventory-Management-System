@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-2xl font-bold mb-6">
            Edit Product
        </h2>

        <form action="{{ route('products.update', $product) }}" method="POST">

            @method('PUT')

            @include('products.partials.form')
            <div class="mt-6 flex gap-3">

                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                    Update
                </button>

                <a href="{{ route('suppliers.index') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-2 rounded-lg">
                    Cancel
                </a>

            </div>
        </form>

    </div>

@endsection
