@php
    $menu = [
        ['route' => 'dashboard', 'is' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'grid'],
        ['route' => 'kelas.index', 'is' => 'kelas.*', 'label' => 'Kelas', 'icon' => 'building'],
        ['route' => 'siswa.index', 'is' => 'siswa.*', 'label' => 'Siswa', 'icon' => 'users'],
        ['route' => 'author.index', 'is' => 'author.*', 'label' => 'Author', 'icon' => 'pen'],
        ['route' => 'kategori.index', 'is' => 'kategori.*', 'label' => 'Kategori', 'icon' => 'tag'],
        ['route' => 'buku.index', 'is' => 'buku.*', 'label' => 'Buku', 'icon' => 'book'],
    ];
@endphp

<aside
    x-cloak
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col bg-slate-900 transition-transform duration-200 ease-in-out lg:static lg:translate-x-0"
>
    <!-- Logo -->
    <div class="flex h-16 shrink-0 items-center gap-3 px-6">
        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600">
            <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
        </div>
        <span class="text-lg font-semibold tracking-wide text-white">Perpus<span class="text-indigo-400">Ku</span></span>
    </div>

    <!-- Nav -->
    <nav class="mt-4 flex-1 space-y-1 overflow-y-auto px-4 pb-6">
        <p class="px-3 pb-2 pt-4 text-xs font-semibold uppercase tracking-widest text-slate-500">Menu</p>

        @foreach ($menu as $item)
            @php $active = request()->routeIs($item['is']); @endphp
            <a href="{{ route($item['route']) }}"
               class="group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                      {{ $active ? 'bg-indigo-600 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="flex h-5 w-5 items-center justify-center">
                    @switch($item['icon'])
                        @case('grid')
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
                            @break
                        @case('building')
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" /></svg>
                            @break
                        @case('users')
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                            @break
                        @case('pen')
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                            @break
                        @case('tag')
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /></svg>
                            @break
                        @case('book')
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                            @break
                    @endswitch
                </span>
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>

    <!-- Bottom user card -->
    <div class="border-t border-slate-800 p-4">
        <div class="flex items-center gap-3 rounded-lg bg-slate-800/60 px-3 py-3">
            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-600 text-sm font-semibold text-white">
                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
            </div>
            <div class="min-w-0 flex-1">
                <p class="truncate text-sm font-medium text-white">{{ Auth::user()->name ?? '-' }}</p>
                <p class="truncate text-xs text-slate-400">{{ Auth::user()->email ?? '-' }}</p>
            </div>
        </div>
    </div>
</aside>

<!-- Mobile overlay -->
<div
    x-cloak
    x-show="sidebarOpen"
    x-transition.opacity
    @click="sidebarOpen = false"
    class="fixed inset-0 z-40 bg-slate-900/50 lg:hidden"
></div>
