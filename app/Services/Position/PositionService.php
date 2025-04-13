<?php

namespace App\Services\Position;

use App\Models\Position\Position;
use App\Repositories\Position\PositionRepository;
use Illuminate\Database\Eloquent\Collection;

class PositionService
{
    private PositionRepository $positionRepository;

    public function __construct(PositionRepository $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    public function create(array $data): ?Position
    {
        $data['code'] = strtoupper(trim($data['code']));

        return $this->positionRepository->create($data);
    }

    public function update(array $data, Position $position): ?Position
    {
        $data['code'] = isset($data['code']) ? strtoupper(trim($data['code'])) : null;
        $data = array_filter($data, fn($value) => !is_null($value));

        return $this->positionRepository->update($data, $position);
    }

    public function delete(Position $position): ?Position
    {
        return $this->positionRepository->delete($position);
    }

    public function findAll(): ?Collection
    {
        return $this->positionRepository->findAll();
    }

    public function findById(int $id): ?Position
    {
        return $this->positionRepository->findById($id);
    }
}
