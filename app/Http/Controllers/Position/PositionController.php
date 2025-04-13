<?php

namespace App\Http\Controllers\Position;

use App\Http\Controllers\Controller;
use App\Http\Requests\Positions\CreatePositionRequest;
use App\Http\Requests\Positions\UpdatePositionRequest;
use App\Models\Position\Position;
use App\Services\Position\PositionService;
use Illuminate\Http\JsonResponse;

class PositionController extends Controller
{
    private PositionService $positionService;

    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    public function create(CreatePositionRequest $request): ?JsonResponse
    {
        $data = $request->only(['code', 'name']);
        $position = $this->positionService->create($data);

        return response()->json([
            'message' => '직무 생성 완료되었습니다.',
            'position' => $position
        ], 201);
    }

    public function update(UpdatePositionRequest $request, Position $position): ?JsonResponse
    {
        $data = $request->only(['code', 'name', 'is_active']);
        $position = $this->positionService->update($data, $position);

        return response()->json([
            'message' => '직무 수정 완료되었습니다.',
            'position' => $position
        ], 201);
    }

    public function delete(Position $position): ?JsonResponse
    {
        $position = $this->positionService->delete($position);

        return response()->json([
            'message' => '직무 삭제 완료되었습니다.',
            'position' => $position
        ], 201);
    }

    public function index(): ?JsonResponse
    {
        return response()->json([
            'positions' => $this->positionService->findAll()
        ], 201);
    }

    public function show(Position $position): ?JsonResponse
    {
        return response()->json([
            'position' => $this->positionService->findById($position->id)
        ], 201);
    }
}
