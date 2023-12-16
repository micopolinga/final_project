<?php

namespace Database\Factories;
use App\Models\Style;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => fake()->name,
            'date' => fake()->date,
            'venue' => fake()->word,
            'description' => Fake()->word,
            'style_id'=>fake()->randomElement(Style::pluck('id')),
        ];
    }
}
