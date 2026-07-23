
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Inventory Management System</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 text-white">

<div class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="container mx-auto px-8 py-6 flex justify-between items-center">

        <h1 class="text-3xl font-bold">
            InventoryMS
        </h1>

        <div class="space-x-3">

            <a href="{{ route('login') }}"
               class="px-5 py-2 rounded-lg border border-white hover:bg-white hover:text-slate-900 transition">

                Login

            </a>

            <a href="{{ route('register') }}"
               class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 transition">

                Register

            </a>

        </div>

    </nav>

    <!-- Hero -->

    <section class="flex-1 flex items-center justify-center">

        <div class="text-center max-w-4xl px-6">

            <h2 class="text-6xl font-extrabold mb-6">

                Inventory Management System

            </h2>

            <p class="text-xl text-gray-300 leading-8 mb-10">

                A complete warehouse management solution built with
                Laravel & Tailwind CSS.

                Manage Products, Categories, Suppliers,
                Stock Movements, Reports and Users easily.

            </p>

            <div class="flex justify-center gap-5">

                <a href="{{ route('login') }}"
                   class="bg-blue-600 hover:bg-blue-700 px-8 py-4 rounded-xl text-lg font-semibold">

                    Get Started

                </a>

                <a href="#features"
                   class="border border-white px-8 py-4 rounded-xl hover:bg-white hover:text-slate-900 transition">

                    Learn More

                </a>

            </div>

        </div>

    </section>

</div>

<!-- Features -->

<section id="features" class="bg-white text-gray-900 py-20">

<div class="container mx-auto px-8">

    <h2 class="text-4xl font-bold text-center mb-12">

        System Features

    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div class="bg-gray-100 rounded-2xl p-8 shadow">
            <h3 class="text-2xl font-bold mb-3">📦 Products</h3>
            <p>Manage inventory products with full CRUD operations.</p>
        </div>

        <div class="bg-gray-100 rounded-2xl p-8 shadow">
            <h3 class="text-2xl font-bold mb-3">🏷 Categories</h3>
            <p>Organize products into categories.</p>
        </div>

        <div class="bg-gray-100 rounded-2xl p-8 shadow">
            <h3 class="text-2xl font-bold mb-3">🚚 Suppliers</h3>
            <p>Manage supplier information efficiently.</p>
        </div>

        <div class="bg-gray-100 rounded-2xl p-8 shadow">
            <h3 class="text-2xl font-bold mb-3">🔄 Stock</h3>
            <p>Track Stock In and Stock Out movements.</p>
        </div>

        <div class="bg-gray-100 rounded-2xl p-8 shadow">
            <h3 class="text-2xl font-bold mb-3">📊 Reports</h3>
            <p>Generate reports and export them to PDF.</p>
        </div>

        <div class="bg-gray-100 rounded-2xl p-8 shadow">
            <h3 class="text-2xl font-bold mb-3">👥 Users</h3>
            <p>Role-based access for Admin and User.</p>
        </div>

    </div>

</div>

</section>

<!-- Footer -->

<footer class="bg-slate-900 text-center py-6">

    <p class="text-gray-400">

        © 2026 Inventory Management System

    </p>

</footer>

</body>
</html>
