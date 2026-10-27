<?php

namespace Database\Seeders;

use App\Models\author;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat beberapa Author jika belum ada
        $author1 = author::firstOrCreate(['namaauthor' => 'Tere Liye']);
        $author2 = author::firstOrCreate(['namaauthor' => 'Pramoedya Ananta Toer']);
        $author3 = author::firstOrCreate(['namaauthor' => 'Robert C. Martin']);

        // 2. Buat beberapa Kategori jika belum ada
        $kategori1 = kategori::firstOrCreate(['namakategori' => 'Novel']);
        $kategori2 = kategori::firstOrCreate(['namakategori' => 'Sastra Sejarah']);
        $kategori3 = kategori::firstOrCreate(['namakategori' => 'Teknologi & Komputer']);

        // 3. Buat beberapa Buku contoh
        buku::firstOrCreate(
            ['judulbuku' => 'Bumi'],
            [
                'author_id'   => $author1->id,
                'kategori_id' => $kategori1->id,
                'jumlahbuku'  => 10,
            ]
        );

        buku::firstOrCreate(
            ['judulbuku' => 'Bumi Manusia'],
            [
                'author_id'   => $author2->id,
                'kategori_id' => $kategori2->id,
                'jumlahbuku'  => 5,
            ]
        );

        buku::firstOrCreate(
            ['judulbuku' => 'Clean Code'],
            [
                'author_id'   => $author3->id,
                'kategori_id' => $kategori3->id,
                'jumlahbuku'  => 8,
            ]
        );
    }
}
