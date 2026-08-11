<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Edit Kategori</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">Perbarui kategori buku.</p>
    </x-slot>

    <div class="mx-auto max-w-2xl rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-100 dark:bg-gray-800 dark:ring-gray-700">
        <x-flash-messages />

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            @include('kategori.form')

            <div class="flex gap-3 pt-2">
                <button type="submit" class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-700">Update</button>
                <a href="{{ route('kategori.index') }}" class="rounded-lg bg-gray-100 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
