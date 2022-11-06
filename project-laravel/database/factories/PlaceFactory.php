<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> fake()->country() ,
            'image', fake()->imageUrl() ,
            'price', fake()->numberBetween(200,1000),
            'description' => fake()->sentence(4,true),
            'city_id',fake()->numberBetween(1, 5),
        ];
    }
}
