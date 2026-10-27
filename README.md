# Manajemen Perpustakaan: API

Aplikasi perpustakaan digital berbasis Laravel. README ini menjelaskan cara menjalankan server dan mencoba API tanpa membaca kode. Kontrak lengkap ada di [`docs/kontrak-api.md`](docs/kontrak-api.md).

## Kebutuhan

- PHP 8.3 atau lebih baru
- Composer
- MySQL (misalnya dari XAMPP/Laragon)
- Postman

## 1. Instalasi

```bash
# 1. Masuk ke folder proyek
cd manjement_perpus

# 2. Pasang dependensi
composer install

# 3. Salin konfigurasi
cp .env.example .env        # Windows: copy .env.example .env

# 4. Buat kunci aplikasi
php artisan key:generate
```

Buat database kosong bernama `manjement_perpus` di MySQL, lalu pastikan `.env` berisi:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manjement_perpus
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan MySQL di komputermu.

## 2. Menjalankan server

```bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
php artisan serve
```

Server berjalan di `http://127.0.0.1:8000`. Biarkan terminal tetap terbuka. API tersedia di `http://127.0.0.1:8000/api`.

Untuk memastikan route API terdaftar:

```bash
php artisan route:list --path=api
```

## 3. Menyiapkan data uji

Buku butuh author dan kategori, jadi isi data lewat halaman web:

1. Buka `http://127.0.0.1:8000` lalu login dengan akun seeder:
   - Email: `admin@perpus.test`
   - Password: `password123` (data fiktif)
2. Tambahkan minimal **1 author**, **1 kategori**, dan **1 buku dengan jumlah buku lebih dari 0**.
3. Tambahkan juga **1 buku dengan jumlah 0** untuk menguji skenario stok habis.

## 4. Cara memperoleh token

1. Kirim `POST {{base_url}}/login` dengan body JSON:
   ```json
   { "email": "admin@perpus.test", "password": "password123" }
   ```
2. Salin nilai `token` dari respons.
3. Pada request terlindungi, pilih Authorization **Bearer Token** lalu tempel token (atau kirim header `Authorization: Bearer <token>`).

Kamu juga bisa membuat akun sendiri lewat `POST {{base_url}}/register`.

## 5. Urutan mencoba API di Postman

1. Import file `postman/perpustakaan.postman_collection.json` (menu **Import**).
2. Buka tab **Variables** pada collection, isi `base_url` dengan `http://127.0.0.1:8000/api`.
3. Jalankan berurutan:
   1. **Auth → Register** (berhasil, lalu ulangi dengan email yang sama untuk melihat 422)
   2. **Auth → Login** (ambil token)
   3. **Auth → User** (dengan token; coba juga tanpa token, harapannya 401)
   4. **Buku → Daftar Buku** (dengan token; coba `?search=laravel`)
   5. **Peminjaman → Pinjam Buku** (isi `buku_id` yang stoknya lebih dari 0; coba juga `buku_id` tidak ada dan buku dengan stok 0)

## Ringkasan Endpoint

| Method | Path | Auth | Keterangan |
|---|---|---|---|
| POST | `/api/register` | Tidak | Daftar pengguna |
| POST | `/api/login` | Tidak | Login, mengembalikan token |
| GET | `/api/user` | Ya | Detail pengguna |
| GET | `/api/buku` | Ya | Daftar buku (`search`, `page`) |
| POST | `/api/peminjaman` | Ya | Pinjam buku (`buku_id`) |

## Masalah umum

- **404**: path kurang awalan `/api`, atau cek `php artisan route:list --path=api`.
- **401**: token belum dikirim, salah, atau kedaluwarsa. Login ulang.
- **500**: lihat `storage/logs/laravel.log`.
- **Gagal konek database**: periksa `.env`, lalu `php artisan config:clear`.
- **Class `AdminUserSeeder` tidak ditemukan** (Linux/macOS): pastikan nama file seeder `AdminUserSeeder.php` (huruf besar-kecil harus sama dengan nama class).

## Keamanan

Semua data dalam repository ini fiktif. File `.env`, token aktif, dan password pribadi tidak disertakan.