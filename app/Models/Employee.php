<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'full_name',
        'email',
        'phone_number',
        'gender',
        'birth_place',
        'birth_date',
        'religion',
        'marital_status',
        'address',
        'city',
        'join_date',
        'employment_status',
        'basic_salary',
        'is_active',
        'department_id',
        'position_id',
        'education_id',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'join_date' => 'date',
        'is_active' => 'boolean',
        'basic_salary' => 'decimal:2',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}
