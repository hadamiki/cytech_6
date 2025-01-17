<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
            'companie_id'=> $this->faker->numberBetween($min = 1, $max = 3),
            'product_name'=> $this->faker->realText(10),
            'price'=> $this->faker->numberBetween($min = 100, $max = 200),
            'stock'=> $this->faker->numberBetween($min = 10, $max = 100),
            'comment'=>  $this->faker->realText(30),
            'img_path'=> $this->faker->realText(20),
        ];
    }
}
