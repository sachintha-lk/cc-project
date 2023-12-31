<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeClasses extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'grade_id',
    ];

    public function grade()
    {
        return $this->belongsTo(\App\Models\Grade::class);
    }

    public function students()
    {
        return $this->hasMany(\App\Models\User::class ,'class_id', 'id');
    }

    public function modules()
    {
        return $this->hasMany(\App\Models\Module::class ,'class_id', 'id');
    }
}
