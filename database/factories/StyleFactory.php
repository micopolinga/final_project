<?php

namespace Database\Factories;
use App\Models\Dancer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Style>
 */
class StyleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dancer_id'=>fake()->randomElement(Dancer::pluck('id')),
            'name' => fake()->word,
            'description'=>fake()->word,
            'origin' => fake()->word,
        ];
    }
}
