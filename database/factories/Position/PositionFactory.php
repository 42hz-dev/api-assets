<?php

namespace Database\Factories\Position;

use App\Models\Position\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'updated_by' => 'admin'
        ];
    }
}
