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
        Schema::create('query_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 16);
            $table->integer('causer_id');
            $table->string('subject_type', 128);
            $table->bigInteger('subject_id');
            $table->text('subject_detail');
            $table->dropTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query_logs');
    }
};
