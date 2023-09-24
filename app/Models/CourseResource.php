<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseResource extends Model
{
    protected $fillable = [
        'name',
        'type',
        'resource',
        'module_id',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

}
