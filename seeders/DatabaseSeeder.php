<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Panggil seeder kategori
        $this->call([
            CategorySeeder::class,
            // Kalau sudah buat ProductSeeder, bisa tambahkan di sini juga:
            // ProductSeeder::class,
        ]);
    }
}
