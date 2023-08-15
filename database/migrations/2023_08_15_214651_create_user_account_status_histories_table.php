<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_account_status_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->boolean('status');
            $table->string('reason');
            $table->integer('changed_by');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_account_status_histories');
    }

};
