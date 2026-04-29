<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'course',
        'email',
        'phone',
        'gender',
        'birthdate',
        'year_level',
        'photo'
    ];
    // Helper to get full name easily
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}