<?php

namespace Database\Factories\Department;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'code' => strtoupper($this->faker->unique()->lexify('A???')),
            'name' => substr($this->faker->unique()->word(), 0, 30),
            'created_by' => 'admin',
            'updated_by' => 'admin'
        ];
    }
}
