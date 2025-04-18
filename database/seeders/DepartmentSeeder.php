<?php

namespace Database\Seeders;

use App\Models\Department\Department;
use App\Models\Position\Position;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory()->count(10)->create();
    }
}
