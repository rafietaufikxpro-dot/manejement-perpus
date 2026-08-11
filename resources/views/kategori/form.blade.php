@php $kategori = $kategori ?? null; @endphp

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Kategori</label>
    <input type="text" name="namakategori" value="{{ old('namakategori', $kategori->namakategori ?? '') }}"
           placeholder="Contoh: Fiksi"
           class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
    @error('namakategori')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
