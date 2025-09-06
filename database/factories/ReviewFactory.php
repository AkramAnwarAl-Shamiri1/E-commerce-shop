<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;

class ReviewFactory extends Factory
{
    public function definition()
    {
        $product = Product::inRandomOrder()->first() ?? Product::factory()->create();
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        return [
            'product_id' => $product->id,
            'user_id' => $user->id,
            'rating' => $this->faker->numberBetween(1,5),
            'comment' => $this->faker->optional()->sentence(),
        ];
    }
}
