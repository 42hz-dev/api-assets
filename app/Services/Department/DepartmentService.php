<?php

namespace App\Services\Department;

use App\Models\Department\Department;
use App\Repositories\Department\DepartmentRepository;
use Illuminate\Database\Eloquent\Collection;

class DepartmentService
{
    private DepartmentRepository $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function create(array $data): ?Department
    {
        $data['code'] = strtoupper(trim($data['code']));

        return $this->departmentRepository->create($data);
    }

    public function update(array $data, Department $department): ?Department
    {
        $data['code'] = strtoupper(trim($data['code']));
        $updateData = array_filter($data, fn($value) => !is_null($value));

        return $this->departmentRepository->update($updateData, $department);
    }

    public function delete(Department $department): ?Department
    {
        return $this->departmentRepository->delete($department);
    }

    public function findAll():? Collection
    {
        return $this->departmentRepository->findAll();
    }

    public function findById(int $id):? Department
    {
        return $this->departmentRepository->findById($id);
    }
}
