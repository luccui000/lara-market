<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => Str::upper($this->faker->sentence(5) . $this->faker->numberBetween(1000, 9999)),
            'name' => $this->faker->sentence(2),
            'price' => $this->faker->randomFloat(),
            'weight' => $this->faker->randomFloat(3, 100, 1000),
            'description' => $this->faker->paragraph(),
            'thumbnail' => $this->faker->imageUrl(),
            'image' => $this->faker->imageUrl(),
            'stock' => $this->faker->numberBetween(10, 100),
        ];
    }
}
