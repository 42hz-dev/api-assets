<?php

namespace App\Models\Department;

use App\Models\Employee\Employee;
use App\Models\Position\Position;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use Blameable, HasFactory;
    protected $fillable = [
        'code',
        'name',
        'is_active',
        'created_by',
        'updated_by'
    ];

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
