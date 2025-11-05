<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'no_hp' => '081234567890',
            'status_akun' => 'aktif',
        ]);

        // Pencari
        User::create([
            'nama' => 'Pencari',
            'email' => 'pencari@example.com',
            'password' => Hash::make('password'),
            'role' => 'pencari',
            'no_hp' => '081987654321',
            'status_akun' => 'aktif',
        ]);

        // Pemberi
        User::create([
            'nama' => 'Pemberi',
            'email' => 'pemberi@example.com',
            'password' => Hash::make('password'),
            'role' => 'pemberi',
            'no_hp' => '082123456789',
            'status_akun' => 'aktif',
        ]);
    }
}
