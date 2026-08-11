<p align="center"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="220" alt="Laravel Logo"> </p> <p align="center"> <img src="https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white" alt="Laravel"> <img src="https://img.shields.io/badge/TailwindCSS-38BDF8?style=flat&logo=tailwindcss&logoColor=white" alt="Tailwind CSS"> <img src="https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white" alt="PHP"> <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License"> </p>

Aplikasi manajemen perpustakaan sekolah berbasis web, dibangun dengan Laravel dan Tailwind CSS, dengan tampilan dashboard bergaya TailAdmin. Aplikasi ini digunakan untuk mengelola data kelas, siswa, author (penulis), kategori, dan buku dalam satu sistem yang terintegrasi.

✨ Fitur
🔐 Autentikasi — login staf/admin (Laravel Breeze), tanpa halaman landing publik — langsung diarahkan ke login.
📊 Dashboard — ringkasan jumlah data (kelas, siswa, author, kategori, buku) dalam bentuk kartu statistik.
🏫 Manajemen Kelas — tambah, lihat, ubah, hapus data kelas & tingkat.
🧑‍🎓 Manajemen Siswa — data siswa terhubung dengan kelas (relasi belongsTo).
✍️ Manajemen Author — data penulis buku.
🏷️ Manajemen Kategori — kategori/genre buku.
📖 Manajemen Buku — data buku terhubung dengan author & kategori.
🔎 Pencarian & Pagination di setiap halaman data.
🛡️ Validasi relasi — data tidak bisa dihapus jika masih dipakai oleh data lain (contoh: Kelas tidak bisa dihapus jika masih ada Siswa di kelas tersebut).
🌙 Mendukung dark mode mengikuti preferensi sistem.
📱 Tampilan responsif untuk desktop & mobile.