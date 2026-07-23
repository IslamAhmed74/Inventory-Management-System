@extends('layouts.admin')

@section('title', 'Create User')

@section('content')

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-2xl font-bold mb-6">

            Create User

        </h2>

        <form action="{{ route('users.store') }}" method="POST">

            @include('users.partials.form')
            <div class="mt-6 flex gap-3">

                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">

                    Save

                </button>
                <a href="{{ route('users.index') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-2 rounded-lg">
                    Cancel
                </a>

            </div>
        </form>


    </div>

@endsection
