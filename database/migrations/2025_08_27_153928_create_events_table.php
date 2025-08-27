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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->dateTime('begin_stamp');
            $table->dateTime('end_stamp')->nullable()->default(null);
            $table->integer('where');
            $table->integer('who');
            $table->integer('reference');
            $table->string('unique_id', 40)->nullable()->default(null);
            $table->string('payload', 100)->nullable()->default(null);
            $table->integer('data_source');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
