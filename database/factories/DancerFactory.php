<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dancer>
 */
class DancerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name'    => fake()->name,
            'birth_date'    => Fake()->date,
            'gender'        => fake()->randomElement(['Male', 'Female', 'Gay']),
            'phone_number'  => fake()->phoneNumber,
        ];
    }
}
