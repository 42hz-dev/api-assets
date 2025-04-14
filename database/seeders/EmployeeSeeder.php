<?php

namespace Database\Seeders;

use App\Models\Employee\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory()->count(10)->create();
    }
}
