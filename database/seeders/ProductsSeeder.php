<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        if (Category::count() === 0) {
            Category::factory()->count(6)->create();
        }
        Product::factory()->count(50)->create();
    }
}
