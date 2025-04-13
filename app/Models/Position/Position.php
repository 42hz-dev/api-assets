<?php

namespace App\Models\Position;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
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
