<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Diagnostyka')</title>
    <link rel="icon" href="{{ asset('images/logo-mobile.svg') }}" type="image/svg+xml">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100">

<!-- Header -->
<header class="text-white py-6 shadow-md">
    <div class="container mx-auto text-center">
        <h1 class="text-3xl font-bold tracking-wider flex justify-center items-center">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-12 mx-auto">
            <span class="ml-2 animate-pulse">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </span>
        </h1>
    </div>

    <div class="bg-green-800 text-white py-3 text-center mt-4">
        <p class="font-semibold text-lg">W trosce o Twoje zdrowie!</p>
    </div>
</header>

<!-- Content -->
<main class="py-10">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-4 text-center">
    <p>&copy; {{ date('Y') }} Diagnostyka</p>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
