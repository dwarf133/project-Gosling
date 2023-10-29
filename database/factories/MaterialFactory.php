<?php

namespace Database\Factories;

use App\Enums\MaterialType;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
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
            'description' => fake()->text(),
            'document_path' => fake()->imageUrl(),
            'lesson_id' => Lesson::query()->inRandomOrder()->first()->id,
            'type' => MaterialType::File
        ];
    }
}
