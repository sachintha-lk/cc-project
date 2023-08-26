<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['Module_name', 'Module_code', 'iscommon', 'class_id', 'teacher_id'];


    // public function grade()
    // {
    //     return $this->belongsTo(\App\Models\Grade::class);
    // }

    public function gradeclass()
    {
        return $this->belongsTo(\App\Models\GradeClasses::class, 'class_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(\App\Models\User::class, 'teacher_id', 'id');
    }

    public function student(){
        return $this->belongsTo(\App\Models\User::class, 'student_id', 'id');
    }

    public function scopeActive($query){

        return $query->where('iscommon', 1);
    }

    public function setModuleNameAttribute($value)
    {
        $this->attributes['Module_name'] = ucfirst(strtolower($value));

    }

    public function setModuleCodeAttribute($value)
    {
        $this->attributes['Module_code'] = strtoupper($value);
    }

    public function quizzes()
    {
        return $this->hasMany(\App\Models\Quiz::class, 'module_id', 'id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }	

}
