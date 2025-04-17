<?php

namespace Database\Factories\Brand;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper($this->faker->unique()->lexify('B???')),
            'name' => substr($this->faker->unique()->word(), 0, 30),
            'created_by' => 'admin',
            'updated_by' => 'admin'
        ];
    }
}
