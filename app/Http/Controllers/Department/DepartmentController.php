<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Departments\CreateDepartmentRequest;
use App\Http\Requests\Departments\UpdateDepartmentRequest;
use App\Models\Department\Department;
use App\Services\Department\DepartmentService;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    private DepartmentService $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function create(CreateDepartmentRequest $request): ?JsonResponse
    {
        $department = $this->departmentService->create($request->only(['code', 'name']));

        return response()->json([
            'message' => '부서 생성 되었습니다.',
            'department' => $department
        ], 201);
    }

    public function update(UpdateDepartmentRequest $request, Department $department):? JsonResponse
    {
        $data = $request->only(['code', 'name']);
        $department = $this->departmentService->update($data, $department);

        return response()->json([
            'message' => '부서 수정 되었습니다.',
            'department' => $department
        ], 201);
    }

    public function delete(Department $department):? JsonResponse
    {
        $department = $this->departmentService->delete($department);

        return response()->json([
            'message' => '부서 삭제 되었습니다.',
            'department' => $department
        ], 201);
    }

    public function index(): ?JsonResponse
    {
        return response()->json([
            'departments' => $this->departmentService->findAll()
        ], 201);
    }

    public function show(Department $department): ?JsonResponse
    {
        return response()->json([
            'departments' => $this->departmentService->findById($department->id)
        ], 201);
    }
}
