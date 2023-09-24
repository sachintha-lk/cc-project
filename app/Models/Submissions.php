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

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function submissionGrade() {
        return $this->hasOne(SubmissionGrade::class, 'submission_id', 'id');
    }


}
