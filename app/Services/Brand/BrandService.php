<?php

namespace App\Services\Brand;

use App\Models\Brand\Brand;
use App\Repositories\Brand\BrandRepository;
use Illuminate\Database\Eloquent\Collection;

class BrandService
{
    private BrandRepository $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function create(array $data): ?Brand
    {
        $data['code'] = strtoupper(trim($data['code']));

        return $this->brandRepository->create($data);
    }

    public function update(array $data, Brand $department): ?Brand
    {
        $data['code'] = isset($data['code']) ? strtoupper(trim($data['code'])) : null;
        $updateData = array_filter($data, fn($value) => !is_null($value));

        return $this->brandRepository->update($updateData, $department);
    }

    public function delete(Brand $department): ?Brand
    {
        return $this->brandRepository->delete($department);
    }

    public function findAll():? Collection
    {
        return $this->brandRepository->findAll();
    }

    public function findById(int $id):? Brand
    {
        return $this->brandRepository->findById($id);
    }
}
