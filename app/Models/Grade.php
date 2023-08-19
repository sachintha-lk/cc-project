<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function gradeclass()
    {
        return $this->hasMany(\App\Models\GradeClass::class);
    }

    public function module()
    {
        return $this->hasMany(\App\Models\Module::class);
    }
}
