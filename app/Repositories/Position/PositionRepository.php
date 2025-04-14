<?php

namespace App\Repositories\Position;

use App\Models\Position\Position;
use Illuminate\Database\Eloquent\Collection;

class PositionRepository
{
    public function create(array $data): ?Position
    {
        $position = new Position();
        $position->code = $data['code'];
        $position->name = $data['name'];

        $position->save();

        return $position;
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
        return Position::with(['department', 'employees'])->get();
    }

    public function findById(int $id): ?Position
    {
        return Position::with(['department', 'employees'])->findOrFail($id);
    }
}
