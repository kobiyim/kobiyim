<?php

/**
 * Kobiyim
 *
 * @version v3.0.2
 *
 */

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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('log_name', 64);
            $table->integer('causer_id');
            $table->string('subject_type', 128)->nullable();
            $table->bigInteger('subject_id')->nullable();
            $table->string('description', 1024);
            $table->text('properties')->nullable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
