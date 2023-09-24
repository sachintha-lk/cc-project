<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('forum_categories', function (Blueprint $table) {

            $table->addColumn('integer', 'module_id', ['unsigned' => true, 'nullable' => true, 'after' => 'id']);
            $table->addColumn('boolean', 'is_for_module', ['default' => false, 'after' => 'module_id']);

            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');


        });
    }

    public function down(): void
    {
        Schema::table('forum_categories', function (Blueprint $table) {
            $table->dropForeign(['module_id']);
            $table->dropColumn('module_id');
            $table->dropColumn('is_for_module');
        });
    }
};
