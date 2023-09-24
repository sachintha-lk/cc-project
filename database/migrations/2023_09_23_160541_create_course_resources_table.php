<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('course_resources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('resource');
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('course_modules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_resources');
    }
};
