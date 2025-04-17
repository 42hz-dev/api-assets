<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\CreateBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Models\Brand\Brand;
use App\Services\Brand\BrandService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private BrandService $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function create(CreateBrandRequest $request): ?JsonResponse
    {
        $brand = $this->brandService->create($request->only(['code', 'name']));

        return response()->json([
            'message' => '브랜드 생성 되었습니다.',
            'brand' => $brand
        ], 201);
    }

    public function update(UpdateBrandRequest $request, Brand $brand):? JsonResponse
    {
        $data = $request->only(['code', 'name']);
        $brand = $this->brandService->update($data, $brand);

        return response()->json([
            'message' => '브랜드 수정 되었습니다.',
            'brand' => $brand
        ], 201);
    }

    public function delete(Brand $brand):? JsonResponse
    {
        $brand = $this->brandService->delete($brand);

        return response()->json([
            'message' => '브랜드 삭제 되었습니다.',
            'brand' => $brand
        ], 201);
    }

    public function index(): ?JsonResponse
    {
        return response()->json([
            'brands' => $this->brandService->findAll()
        ], 201);
    }

    public function show(Brand $brand): ?JsonResponse
    {
        return response()->json([
            'brands' => $this->brandService->findById($brand->id)
        ], 201);
    }
}
