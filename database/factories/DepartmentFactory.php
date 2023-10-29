<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstNameFemale(),
            'description' => fake()->realText(15),
            'parent_id' => rand(1, 10),
            'company_id' => Company::query()->inRandomOrder()->first()->id,
        ];
    }
}
