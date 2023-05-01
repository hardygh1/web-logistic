<?php

namespace Database\Factories;

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
            'name' => fake()->text(30),
            'description' => fake()->text(200),
            'status' => fake()->randomElement(['Borrador', 'Publicado']),
            'type' => fake()->randomElement(['Concierto', 'Fútbol', 'Teatro','Stanbul']),
            'date' => fake()->date()
        ];
    }
}
