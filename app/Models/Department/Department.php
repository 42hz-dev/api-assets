<?php

namespace App\Models\Department;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
