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
}
