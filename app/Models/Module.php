<?php

namespace App\Models;

use Harishdurga\LaravelQuiz\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
//    use HasFactory;

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
        return $this->hasMany(Quiz::class, 'module_id', 'id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function forumCategory()
    {
        return $this->hasOne(\TeamTeaTime\Forum\Models\Category::class, 'module_id', 'id');
    }

    // created event
    protected static function booted()
    {
        static::created(function ($module) {
            // When a module is created, create forum category for it
            $gradeName = $module->gradeclass->grade->name;
            $className = $module->gradeclass->class_name;
            $moduleName = $module->Module_name;
            $moduleCode = $module->Module_code;

            $module->forumCategory()->create([
                'title' => "{$gradeName} {$className} {$moduleName} {$moduleCode}",
                'is_for_module' => true,
                'accepts_threads' => true,
            ]);


        });

        // updated event
        static::updated(function ($module) {
            // When a module is updated, update forum category for it
            $gradeName = $module->gradeclass->grade->name;
            $className = $module->gradeclass->class_name;
            $moduleName = $module->Module_name;
            $moduleCode = $module->Module_code;

            $module->forumCategory()->update([
                'title' => "{$gradeName} {$className} {$moduleName} {$moduleCode}",
                'is_for_module' => true,
                'accepts_threads' => true,
            ]);
        });

        // deleted event
        static::deleted(function ($module) {
            // When a module is deleted, delete forum category for it
            $module->forumCategory()->delete();
        });
    }

    public function courseResources()
    {
        return $this->hasMany(CourseResource::class);
    }


}
