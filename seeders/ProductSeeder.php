<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Ambil semua kategori yang ada
        $categories = Category::all();

        if ($categories->count() == 0) {
            $this->command->info('Tidak ada kategori, silakan seed kategori dulu!');
            return;
        }

        // Buat 30 produk dengan random category_id
        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'name' => $faker->productName ?? $faker->words(3, true),
                'description' => $faker->sentence(10),
                'price' => $faker->numberBetween(10000, 1000000),
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}
