<?php

namespace App\Repositories\Brand;

use App\Models\Brand\Brand;
use Illuminate\Database\Eloquent\Collection;

class BrandRepository
{
    public function create(array $data): ?Brand
    {
        $brand = new Brand();
        $brand->code = $data['code'];
        $brand->name = $data['name'];

        $brand->save();

        return $brand;
    }

    public function update(array $data, Brand $brand): ?Brand
    {
        $brand->update($data);
        return $brand;
    }

    public function delete(Brand $brand): ?Brand
    {
        $brand->delete();
        return $brand;
    }

    public function findAll():? Collection
    {
        return Brand::all();
    }

    public function findById(int $id):? Brand
    {
        return Brand::findOrFail($id);
    }
}
