<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_submission',
        'assignment_id',
        'student_id',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
}
