<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Data Kategori</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">Kelola kategori buku.</p>
    </x-slot>

    <div class="rounded-xl bg-white shadow-sm ring-1 ring-gray-100 dark:bg-gray-800 dark:ring-gray-700">
        <div class="flex flex-col gap-3 border-b border-gray-100 p-5 sm:flex-row sm:items-center sm:justify-between dark:border-gray-700">
            <form method="GET" class="relative w-full sm:w-72">
                <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kategori..."
                       class="w-full rounded-lg border-gray-300 pl-9 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            </form>
            <a href="{{ route('kategori.create') }}"
               class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Tambah Kategori
            </a>
        </div>

        <div class="p-5 pt-0">
            <x-flash-messages />
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500 dark:bg-gray-700/50 dark:text-gray-400">
                    <tr>
                        <th class="px-5 py-3 font-medium">#</th>
                        <th class="px-5 py-3 font-medium">Nama Kategori</th>
                        <th class="px-5 py-3 text-right font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($kategoris as $item)
                        <tr class="text-gray-700 hover:bg-gray-50 dark:text-gray-200 dark:hover:bg-gray-700/40">
                            <td class="px-5 py-3.5">{{ $loop->iteration + ($kategoris->currentPage() - 1) * $kategoris->perPage() }}</td>
                            <td class="px-5 py-3.5 font-medium">{{ $item->namakategori }}</td>
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('kategori.edit', $item->id) }}" class="font-medium text-indigo-600 hover:text-indigo-800">Edit</a>
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin hapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 hover:text-red-800">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-5 py-10 text-center text-gray-400">Belum ada data kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-gray-100 p-5 dark:border-gray-700">
            {{ $kategoris->links() }}
        </div>
    </div>
</x-app-layout>
