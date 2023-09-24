<?php

namespace App\Models;

use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttempt;
use Illuminate\Database\Eloquent\Model;

class StudentQuizScore extends Model
{
    protected $fillable = [
        'student_user_id',
        'module_id',
        'quiz_id',
        'quiz_attempt_id',
        'score',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_user_id');
    }

    public function quizAttempt()
    {
        return $this->belongsTo(QuizAttempt::class);
    }

    public function getFormattedScoreAttribute()
    {
        return number_format($this->score, 2);
    }


}
