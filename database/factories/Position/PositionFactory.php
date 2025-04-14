<?php

namespace Database\Factories\Position;

use App\Models\Department\Department;
use App\Models\Position\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position\Position>
 */
class PositionFactory extends Factory
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
            'name' => substr($this->faker->unique()->jobTitle(), 0, 30),
            'created_by' => 'admin',
            'updated_by' => 'admin',
            'department_id' => Department::inRandomOrder()->first()->id
        ];
    }
}
