<?php

namespace App\Models\Employee;

use App\Models\Department\Department;
use App\Models\Position\Position;
use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use Blameable, HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'phone',
        'emergency_phone',
        'email',
        'postal_code',
        'address_line1',
        'address_line2',
        'gender',
        'is_status',
        'created_by',
        'updated_by'
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
