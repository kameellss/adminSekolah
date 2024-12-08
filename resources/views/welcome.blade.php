<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>

      

    </head>
    <body class="antialiased">
        <div class="relative flex items-center justify-center bg-neutral-900 min-h-screen ">
            {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="max-w-md w-full rounded-xl h-fit p-4 space-y-4 bg-white shadow-md">
                <h1 class="font-semibold text-center text-2xl mb-4 ">
                    Sistem Manajemen Konten Web Sekolah
                </h1>
                <a href="{{ route('login') }}" class="py-2" >
                    <button class="bg-neutral-800 px-4 py-1.5 w-full  text-white rounded-lg">
                        Log in
                    </button>

                </a>

        
            </div>

        </div>
    </body>
</html>
