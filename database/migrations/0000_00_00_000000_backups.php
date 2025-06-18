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
        Schema::create('backups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename', 1024);
            $table->string('dir', 1024);
            $table->string('type', 4);
            $table->tinyInteger('is_loaded')->default(0);
            $table->double('size')->default(0);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backups');
    }
};
