<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Student::factory(20)->create();
        // Classroom::factory(3)->create();
        // Subject::factory()->count(14)->create();
        // Teacher::factory()->count(15)->create();

        Classroom::factory(10)->hasStudents(5)->create();
        $subjects = Subject::factory()->count(10)->create();
        foreach ($subjects as $subject) {
        Teacher::factory()->create([
            'subject_id' => $subject->id,
        ]);
    }
    }
}
