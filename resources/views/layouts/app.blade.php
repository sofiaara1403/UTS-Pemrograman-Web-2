<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✨ PREMIUM STYLE (PUNYA KAMU) -->
    <style>
        body {
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
        }

        .card {
            border: none;
            border-radius: 20px;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .btn {
            border-radius: 20px;
        }

        table {
            border-radius: 10px;
            overflow: hidden;
        }

        .glass {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(10px);
        }

        /* 🔥 TAMBAHAN BARU (AESTHETIC) */
        .card-aesthetic {
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .btn-soft {
            border-radius: 30px;
            padding: 6px 15px;
            transition: 0.3s;
        }

        .btn-soft:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .icon-big {
            font-size: 32px;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        @include('layouts.navigation')

        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4">
                {{ $header }}
            </div>
        </header>
        @endisset

        <main class="container mt-4">
            {{ $slot }}
        </main>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>