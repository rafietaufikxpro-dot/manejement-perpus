<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PerpusKu') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex min-h-screen">

            <!-- Left brand panel -->
            <div class="relative hidden w-1/2 flex-col justify-between overflow-hidden bg-slate-900 p-12 lg:flex">
                <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-indigo-600/30 blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-24 -left-10 h-72 w-72 rounded-full bg-indigo-500/20 blur-3xl"></div>

                <a href="/" class="relative flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <span class="text-xl font-semibold text-white">Perpus<span class="text-indigo-400">Ku</span></span>
                </a>

                <div class="relative">
                    <h1 class="text-3xl font-semibold leading-tight text-white">
                        Sistem Manajemen<br />Perpustakaan Sekolah
                    </h1>
                    <p class="mt-4 max-w-sm text-sm leading-relaxed text-slate-400">
                        Kelola data kelas, siswa, author, kategori, dan buku dalam satu dashboard yang rapi dan mudah digunakan.
                    </p>
                </div>

                <p class="relative text-xs text-slate-500">&copy; {{ date('Y') }} PerpusKu. All rights reserved.</p>
            </div>

            <!-- Right form panel -->
            <div class="flex w-full flex-col items-center justify-center bg-gray-50 px-6 py-12 lg:w-1/2 dark:bg-gray-900">
                <div class="mb-8 flex items-center gap-3 lg:hidden">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <span class="text-xl font-semibold text-gray-800 dark:text-gray-100">Perpus<span class="text-indigo-600">Ku</span></span>
                </div>

                <div class="w-full sm:max-w-md">
                    <div class="rounded-2xl bg-white px-8 py-10 shadow-sm ring-1 ring-gray-100 dark:bg-gray-800 dark:ring-gray-700">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
