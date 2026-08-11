@php $siswa = $siswa ?? null; @endphp

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Siswa</label>
    <input type="text" name="namasiswa" value="{{ old('namasiswa', $siswa->namasiswa ?? '') }}"
           placeholder="Contoh: Budi Santoso"
           class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
    @error('namasiswa')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">NIS</label>
    <input type="text" name="nis" value="{{ old('nis', $siswa->nis ?? '') }}"
           placeholder="Contoh: 2425001"
           class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
    @error('nis')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Kelas</label>
    <select name="kelas_id"
            class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
        <option value="">-- Pilih Kelas --</option>
        @foreach ($kelas as $item)
            <option value="{{ $item->id }}" @selected(old('kelas_id', $siswa->kelas_id ?? '') == $item->id)>
                {{ $item->nama_kelas }} ({{ $item->tingkat }})
            </option>
        @endforeach
    </select>
    @error('kelas_id')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
