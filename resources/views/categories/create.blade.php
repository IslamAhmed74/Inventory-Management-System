@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')

    <div class="bg-white rounded-xl shadow p-6">

        <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">

            @include('categories.partials.form')

            <div class="mt-6 flex gap-3">

                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">

                    Save

                </button>

                <a href="{{ route('suppliers.index') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-2 rounded-lg">
                    Cancel
                </a>

            </div>

        </form>

    </div>

@endsection
