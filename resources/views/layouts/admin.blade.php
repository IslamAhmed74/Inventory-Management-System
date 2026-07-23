<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>@yield('title', 'Inventory MS')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-200 shadow-xl">

    <div class="flex h-screen">

        <!-- Sidebar -->

        <aside class="w-64 bg-slate-900 text-white h-screen fixed left-0 top-0">

            <div class="p-6 border-b border-slate-700">

                <h1 class="text-3xl text-blue-200 font-bold tracking-wide">
                    Inventory
                </h1>

                <p class="text-sm font-bold text-sky-600 mt-2">
                    Welcome {{ auth()->user()->name }}
                </p>

            </div>

            <nav class="mt-6 space-y-2 px-3">

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-purple-600">

                    📊 Dashboard

                </a>

                @if (auth()->user()->type == 'admin')
                    <a href="{{ route('categories.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-purple-600">

                        📂 Categories

                    </a>

                    <a href="{{ route('suppliers.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-purple-600 ">

                        🚚 Suppliers

                    </a>

                    <a href="{{ route('products.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-purple-600 ">
                        📦 Products

                    </a>

                    <a href="{{ route('users.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-purple-600 ">

                        👥 Users

                    </a>
                @endif
                @if (auth()->user()->type == 'user')
                    <a href="{{ route('inventory.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-purple-600">

                        📦 Inventory

                    </a>
                @endif
                <a href="{{ route('stock-movements.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-purple-600 ">

                    🔄 Stock

                </a>

                <a href="{{ route('reports.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-purple-600 ">

                    📑 Reports

                </a>


            </nav>

        </aside>

        <!-- Main Content -->
        <div class="bg-gray-300 flex-1 ml-64 flex flex-col">

            <!-- Header -->
            <header class="bg-sky-900 text-white shadow">

                <div class="flex justify-between items-center px-6 py-4">

                    <h1 class="text-xl font-bold">
                        @yield('title')
                    </h1>

                    <div class="flex items-center gap-6">

                        <span class="text-la font-bold mt-2">
                            {{ auth()->user()->name }}
                        </span>

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-xl">

                                ➡️ Logout

                            </button>

                        </form>

                    </div>

                </div>

            </header>

            <!-- Page Content -->
            <main class="p-6 bg-gray-300 overflow-y-auto">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>
