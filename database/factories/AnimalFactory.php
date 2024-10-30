<?php

namespace Database\Factories;

use App\Models\Cage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "species" => $this->faker->name(),
            "age" => $this->faker->numberBetween(1, 100),
            "gender" => $this->faker->boolean(),
            "desc" => $this->faker->text(),
            'cage_id' => Cage::factory()
        ];
    }
}
