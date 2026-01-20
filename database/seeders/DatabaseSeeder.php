<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // <--- PENTING: Jangan lupa ini
use Illuminate\Support\Facades\Hash; // <--- PENTING: Buat enkripsi password

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Kode ini akan Mencari email 'admin@latif.com'
        // Kalau GAK ADA -> Dia buat baru
        // Kalau SUDAH ADA -> Dia akan update password-nya jadi 'password'

        User::updateOrCreate(
            ['email' => 'admin@latif.com'], // Cek berdasarkan email ini
            [
                'name' => 'Latif Admin',
                'password' => Hash::make('password'), // Password default
                'email_verified_at' => now(),
            ]
        );

        // Bisa tambahkan seeder lain disini (Project, Skill, dll)
    }
}
