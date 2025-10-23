<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'brand_id' => Brand::factory(),
            'category_id' => Category::factory(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'photo' => fake()->imageUrl(640, 480, 'products', true),
        ];
    }
}
