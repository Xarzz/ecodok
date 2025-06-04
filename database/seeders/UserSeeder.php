<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Adiwiyata',
            'email' => 'admin@adiwiyata.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'kelas' => null,
        ]);

        // Siswa kelas XI B
        User::create([
            'name' => 'Siswa Satu',
            'email' => 'siswa1@adiwiyata.test',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'kelas' => 'XI B',
        ]);

        // Siswa kelas XI A
        User::create([
            'name' => 'Siswa Dua',
            'email' => 'siswa2@adiwiyata.test',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'kelas' => 'XI A',
        ]);
    }
}
