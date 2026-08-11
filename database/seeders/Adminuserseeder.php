<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Membuat satu-satunya user admin untuk sistem ini.
     * Jalankan: php artisan db:seed --class=AdminUserSeeder
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@perpus.test'],
            [
                'name'     => 'Admin Perpustakaan',
                'password' => Hash::make('password123'), // GANTI setelah login pertama kali
                'email_verified_at' => now(),
            ]
        );
    }
}