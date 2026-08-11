<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Dashboard</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">Ringkasan data perpustakaan sekolah.</p>
    </x-slot>

    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">
                Halo, {{ Auth::user()->name }} 👋
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Berikut ringkasan data pada sistem kamu hari ini.</p>
        </div>

        <!-- Stat cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-5">
            @php
                $cards = [
                    ['label' => 'Kelas', 'value' => $totalKelas ?? 0, 'route' => 'kelas.index', 'color' => 'indigo', 'icon' => 'building'],
                    ['label' => 'Siswa', 'value' => $totalSiswa ?? 0, 'route' => 'siswa.index', 'color' => 'emerald', 'icon' => 'users'],
                    ['label' => 'Author', 'value' => $totalAuthor ?? 0, 'route' => 'author.index', 'color' => 'amber', 'icon' => 'pen'],
                    ['label' => 'Kategori', 'value' => $totalKategori ?? 0, 'route' => 'kategori.index', 'color' => 'sky', 'icon' => 'tag'],
                    ['label' => 'Buku', 'value' => $totalBuku ?? 0, 'route' => 'buku.index', 'color' => 'rose', 'icon' => 'book'],
                ];
                $colorMap = [
                    'indigo' => 'bg-indigo-50 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-300',
                    'emerald' => 'bg-emerald-50 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-300',
                    'amber' => 'bg-amber-50 text-amber-600 dark:bg-amber-900/30 dark:text-amber-300',
                    'sky' => 'bg-sky-50 text-sky-600 dark:bg-sky-900/30 dark:text-sky-300',
                    'rose' => 'bg-rose-50 text-rose-600 dark:bg-rose-900/30 dark:text-rose-300',
                ];
            @endphp

            @foreach ($cards as $card)
                <a href="{{ route($card['route']) }}"
                   class="group rounded-xl bg-white p-5 shadow-sm ring-1 ring-gray-100 transition hover:shadow-md dark:bg-gray-800 dark:ring-gray-700">
                    <div class="flex items-center justify-between">
                        <span class="flex h-11 w-11 items-center justify-center rounded-lg {{ $colorMap[$card['color']] }}">
                            @switch($card['icon'])
                                @case('building')
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" /></svg>
                                    @break
                                @case('users')
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                                    @break
                                @case('pen')
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125" /></svg>
                                    @break
                                @case('tag')
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /></svg>
                                    @break
                                @case('book')
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                                    @break
                            @endswitch
                        </span>
                        <svg class="h-4 w-4 text-gray-300 transition group-hover:translate-x-0.5 group-hover:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                    <p class="mt-4 text-2xl font-semibold text-gray-800 dark:text-gray-100">{{ $card['value'] }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $card['label'] }}</p>
                </a>
            @endforeach
        </div>

        <!-- Quick links -->
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-100 dark:bg-gray-800 dark:ring-gray-700">
            <h4 class="mb-4 text-sm font-semibold text-gray-800 dark:text-gray-100">Aksi Cepat</h4>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('siswa.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">+ Tambah Siswa</a>
                <a href="{{ route('buku.create') }}" class="rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">+ Tambah Buku</a>
                <a href="{{ route('kelas.create') }}" class="rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">+ Tambah Kelas</a>
            </div>
        </div>
    </div>
</x-app-layout>
