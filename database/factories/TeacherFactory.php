<?php

namespace Database\Factories;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'niy' => fake()->numerify('##########'),
            'subject_id' => Subject::factory(),
            'start_date' => fake()->date(),
        ];
    }
}
