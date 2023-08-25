<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_quiz_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_user_id');
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('quiz_attempt_id');
            $table->float('score');
            $table->timestamps();

            $table->foreign('student_user_id')->references('id')->on('users');
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->foreign('quiz_attempt_id')->references('id')->on('quiz_attempts');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_quiz_scores');
    }
};
