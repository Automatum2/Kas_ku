<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat Akun Bendahara
        User::create([
            'nis' => '12345',
            'nisn' => '1234567890',
            'nama_lengkap' => 'Bendahara Utama',
            'role' => 'Bendahara',
        ]);

        // Membuat Akun Siswa Contoh
        User::create([
            'nis' => '67890',
            'nisn' => '0987654321',
            'nama_lengkap' => 'Siswa Contoh',
            'role' => 'Siswa',
        ]);
    }
}
