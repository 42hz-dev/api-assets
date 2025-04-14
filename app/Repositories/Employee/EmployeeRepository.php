<?php

namespace App\Repositories\Employee;

use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{
    public function create(array $data): ?Employee
    {
        $employee = new Employee();
        $employee->name = $data['name'];
        $employee->phone = $data['phone'];
        $employee->emergency_phone = $data['emergency_phone'];
        $employee->email = $data['email'];
        $employee->postal_code = $data['postal_code'];
        $employee->address_line1 = $data['address_line1'];
        $employee->address_line2 = $data['address_line2'];
        $employee->gender = $data['gender'];
        $employee->is_status = $data['is_status'];

        $employee->save();

        return $employee;
    }

    public function update(array $data, Employee $employee): ?Employee
    {
        $employee->update($data);
        return $employee;
    }

    public function delete(Employee $employee): ?Employee
    {
        $employee->delete();
        return $employee;
    }

    public function findAll(): ?Collection
    {
        return Employee::with(['department', 'position'])->get();
    }

    public function findById(int $id): ?Employee
    {
        return Employee::with(['department', 'position'])->findOrFail($id);
    }
}
