<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'brand' => $this->faker->name,
            'value' => $this->faker->randomFloat(4, 0, 100),
            'stock' => $this->faker->numberBetween(0, 100)
        ];
    }
}
