<?php

namespace App\Services\Employee;

use App\Models\Employee\Employee;
use App\Repositories\Employee\EmployeeRepository;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService
{
    private EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function create(array $data): ?Employee
    {
        return $this->employeeRepository->create($data);
    }

    public function update(array $data, Employee $employee): ?Employee
    {
        $data = array_filter($data, fn($value) => !is_null($value));
        return $this->employeeRepository->update($data, $employee);
    }

    public function delete(Employee $employee): ?Employee
    {
        return $this->employeeRepository->delete($employee);
    }

    public function findAll(): ?Collection
    {
        return $this->employeeRepository->findAll();
    }

    public function findById(int $id): ?Employee
    {
        return $this->employeeRepository->findById($id);
    }
}
