<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('modules', function (Blueprint $table) {
        $table->id();
        $table->string('Module_name');
        $table->string('Module_code');
        $table->boolean('iscommon')->default(true);
        $table->unsignedBigInteger('class_id');
        $table->foreign('class_id')->references('id')->on('grade_classes')->onDelete('cascade');
        $table->unsignedBigInteger('teacher_id')->nullable(); // Add this line for teacher assignment
        $table->foreign('teacher_id')->references('id')->on('users')->onDelete('set null'); // Add this line for teacher assignment
        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
