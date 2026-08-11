@php $author = $author ?? null; @endphp

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Author</label>
    <input type="text" name="namaauthor" value="{{ old('namaauthor', $author->namaauthor ?? '') }}"
           placeholder="Contoh: Tere Liye"
           class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
    @error('namaauthor')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
