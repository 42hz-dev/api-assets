<?php

namespace App\Repositories\Department;

use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepository
{
    public function create(array $data): ?Department
    {
        return Department::create([
            'code' => $data['code'],
            'name' => $data['name'],
        ]);
    }

    public function update(array $data, Department $department): ?Department
    {
        $department->update($data);
        return $department;
    }

    public function delete(Department $department): ?Department
    {
        $department->delete();
        return $department;
    }

    public function findAll():? Collection
    {
        return Department::all();
    }

    public function findById(int $id):? Department
    {
        return Department::findOrFail($id);
    }
}
