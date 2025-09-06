<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category; // تأكد من استيراد الموديل

class CategoryFactory extends Factory
{
    protected $model = Category::class; // ← هذا مهم

    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
