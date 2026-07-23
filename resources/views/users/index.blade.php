@extends('layouts.admin')

@section('title', 'Users')

@section('content')

    <div class="bg-white rounded-xl shadow p-6">

        <div class="flex justify-between mb-2">

            <h2 class="text-2xl font-bold">

                Users

            </h2>
            <form action="{{ route('users.index') }}" method="GET" class="flex gap-2">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Category..."
                    class="border rounded-lg px-4 py-2">

                <button class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">
                    Search
                </button>

                @if (request('search'))
                    <a href="{{ route('users.index') }}" class="bg-gray-500 text-gray px-4 py-2 rounded-lg">
                        Reset
                    </a>
                @endif

            </form>

            <a href="{{ route('users.create') }}" class="bg-blue-200 hover:bg-blue-300 text-black px-4 py-2 rounded-lg">

                + Add User

            </a>

        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Role</th>
                    <th class="p-3 text-left">Created</th>
                    <th class="p-3 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)
                    <tr class="border-b">

                        <td class="p-3 text-left">

                            {{ $user->name }}

                        </td>

                        <td class="p-3 text-left">

                            {{ $user->email }}

                        </td>

                        <td class="p-3 text-left">

                            @if ($user->type == 'admin')
                                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full">

                                    Admin

                                </span>
                            @else
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                                    User

                                </span>
                            @endif

                        </td>

                        <td class="p-3 text-left">

                            {{ $user->created_at->format('d/m/Y') }}

                        </td>

                        <td class="p-3 flex justify-center gap-4">



                            @php
                                $lastAdmin = $user->user_type == 'admin' && $adminsCount == 1;
                            @endphp

                            @if ($user->id != auth()->id() && !$lastAdmin)
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="bg-yellow-500 text-gray px-3 py-1 rounded-xl">

                                        Edit

                                    </a>
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete this user?')"
                                        class="bg-red-600 text-gray px-3 py-1 rounded-xl">

                                        Delete

                                    </button>

                                </form>
                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center p-5">

                            No Users Found

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

        <div class="mt-6">

            {{ $users->links() }}

        </div>

    </div>

@endsection
