<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('submission_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submission_id');
            $table->foreign('submission_id')->references('id')->on('submissions')->onDelete('cascade');
            $table->double('grade');
            $table->string('comment');
            $table->unsignedBigInteger('graded_by')->nullable();
            $table->foreign('graded_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submission_grades');
    }
};
