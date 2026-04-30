<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'nama_kategori' => 'Uang Kas Mingguan',
            'jenis' => 'Pemasukan',
        ]);

        Category::create([
            'nama_kategori' => 'Uang Kas Bulanan',
            'jenis' => 'Pemasukan',
        ]);

        Category::create([
            'nama_kategori' => 'Pembelian ATK',
            'jenis' => 'Pengeluaran',
        ]);

        Category::create([
            'nama_kategori' => 'Kegiatan Sosial',
            'jenis' => 'Pengeluaran',
        ]);
    }
}
