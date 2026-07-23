<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Inventory Management System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">

                <img src="{{ asset('images/logo.png') }}" class="w-24 mx-auto mb-4">

                <h1 class="text-4xl font-bold text-white">

                    Inventory MS

                </h1>

                <p class="text-blue-200 mt-2">

                    Inventory Management System

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">

                {{ $slot }}

            </div>

        </div>

    </div>

    <script>
        function togglePassword(id) {

            const input = document.getElementById(id);

            input.type = input.type === 'password' ?
                'text' :
                'password';

        }
    </script>

</body>

</html>
