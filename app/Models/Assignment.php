<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable =[
        'start_date',
        'deadline',
        'assignment_name',
        'assignment_description',
        'assignment_file',
        'assignment_type',
        'module_id'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submissions::class);
    }
}
