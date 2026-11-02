<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "classroom_name" => fake()->randomElement(["10 PPLG 1", "10 PPLG 2", "11 PPLG 1", "11 PPLG 2", "11 PPLG 3"]),
            "major" => fake()->randomElement(["PPLG", "TKJ", "RPL"]),
        ];
    }
}
