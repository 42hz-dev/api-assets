<?php

namespace App\Repositories\Position;

use App\Models\Position\Position;
use Illuminate\Database\Eloquent\Collection;

class PositionRepository
{
    public function create(array $data): ?Position
    {
        return Position::create([
            'code' => $data['code'],
            'name' => $data['name'],
        ]);
    }

    public function update(array $data, Position $position): ?Position
    {
        $position->update($data);
        return  $position;
    }

    public function delete(Position $position): ?Position
    {
        $position->delete();
        return $position;
    }

    public function findAll(): ?Collection
    {
        return Position::all();
    }

    public function findById(int $id): ?Position
    {
        return Position::findOrFail($id);
    }
}
