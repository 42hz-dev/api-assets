<?php

namespace Database\Factories\Employee;

use App\Models\Department\Department;
use App\Models\Position\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->numerify('010-####-####'),
            'emergency_phone' => $this->faker->numerify('010-####-####'),
            'email' => $this->faker->email(),
            'postal_code' => $this->faker->numerify('####-####'),
            'address_line1' => $this->faker->word(),
            'address_line2' => $this->faker->word(),
            'gender' => 'man',
            'is_status' => 'intern',
            'created_by' => 'admin',
            'updated_by' => 'admin',
            'department_id' => Department::inRandomOrder()->first()->id,
            'position_id' => Position::inRandomOrder()->first()->id
        ];
    }
}
