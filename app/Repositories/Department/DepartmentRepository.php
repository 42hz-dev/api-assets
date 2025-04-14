<?php

namespace App\Repositories\Department;

use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepository
{
    public function create(array $data): ?Department
    {
        $department = new Department();
        $department->code = $data['code'];
        $department->name = $data['name'];

        $department->save();

        return $department;
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
        return Department::with(['positions', 'employees'])->get();
    }

    public function findById(int $id):? Department
    {
        return Department::with(['positions', 'employees'])->findOrFail($id);
    }
}
