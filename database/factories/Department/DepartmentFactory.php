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
            'code' => strtoupper($this->faker->lexify('A???')),
            'name' => $this->faker->word(),
            'created_by' => 'admin',
            'updated_by' => 'admin'
        ];
    }
}
