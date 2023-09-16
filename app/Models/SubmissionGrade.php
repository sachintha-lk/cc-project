<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionGrade extends Model
{
    protected $fillable = [
        'submission_id',
        'grade',
        'comment',
        'graded_by',
    ];

    public function submission()
    {
        return $this->belongsTo(Submissions::class);
    }

    public function gradedBy()
    {
        return $this->belongsTo(User::class);
    }

}
