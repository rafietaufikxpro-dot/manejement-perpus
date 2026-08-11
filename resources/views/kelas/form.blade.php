@php $kela = $kela ?? null; @endphp

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Kelas</label>
    <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $kela->nama_kelas ?? '') }}"
           placeholder="Contoh: XII IPA 1"
           class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
    @error('nama_kelas')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Tingkat</label>
    <input type="text" name="tingkat" value="{{ old('tingkat', $kela->tingkat ?? '') }}"
           placeholder="Contoh: XII"
           class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
    @error('tingkat')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
