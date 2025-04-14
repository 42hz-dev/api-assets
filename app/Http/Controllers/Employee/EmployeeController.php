<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\CreateEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Models\Employee\Employee;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function create(CreateEmployeeRequest $request): ?JsonResponse
    {
        $data = $request->only([
            'name',
            'phone',
            'emergency_phone',
            'email',
            'postal_code',
            'address_line1',
            'address_line2',
            'gender',
            'is_status'
        ]);
        $employee = $this->employeeService->create($data);
        return response()->json([
            'message' => '임직원 생성 완료되었습니다.',
            'employee' => $employee
        ], 201);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): ?JsonResponse
    {
        $data = $request->only([
            'name',
            'phone',
            'emergency_phone',
            'email',
            'postal_code',
            'address_line1',
            'address_line2',
            'gender',
            'is_status'
        ]);
        $employee = $this->employeeService->update($data, $employee);
        return response()->json([
            'message' => '임직원 수정 완료되었습니다.',
            'employee' => $employee
        ], 201);
    }

    public function delete(Employee $employee): ?JsonResponse
    {
        $employee = $this->employeeService->delete($employee);
        return response()->json([
            'message' => '임직원 삭제 완료되었습니다.',
            'employee' => $employee
        ], 201);
    }

    public function index(): ?JsonResponse
    {
        return response()->json([
            'employees' => $this->employeeService->findAll()
        ], 201);
    }

    public function show(Employee $employee): ?JsonResponse
    {
        return response()->json([
            'employee' => $this->employeeService->findById($employee->id)
        ], 201);
    }
}
