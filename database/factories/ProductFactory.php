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
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'model' => $this->faker->bothify('Model-####'),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'category_id' => $this->faker->uuid(),
        ];
    }
}
