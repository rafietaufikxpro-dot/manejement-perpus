@php $buku = $buku ?? null; @endphp

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Buku</label>
    <input type="text" name="judulbuku" value="{{ old('judulbuku', $buku->judulbuku ?? '') }}"
           placeholder="Contoh: Laskar Pelangi"
           class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
    @error('judulbuku')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Author</label>
        <select name="author_id"
                class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            <option value="">-- Pilih Author --</option>
            @foreach ($authors as $item)
                <option value="{{ $item->id }}" @selected(old('author_id', $buku->author_id ?? '') == $item->id)>
                    {{ $item->namaauthor }}
                </option>
            @endforeach
        </select>
        @error('author_id')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
        <select name="kategori_id"
                class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategoris as $item)
                <option value="{{ $item->id }}" @selected(old('kategori_id', $buku->kategori_id ?? '') == $item->id)>
                    {{ $item->namakategori }}
                </option>
            @endforeach
        </select>
        @error('kategori_id')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Buku</label>
    <input type="number" min="0" name="jumlahbuku" value="{{ old('jumlahbuku', $buku->jumlahbuku ?? '') }}"
           placeholder="Contoh: 10"
           class="w-full rounded-lg border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
    @error('jumlahbuku')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
