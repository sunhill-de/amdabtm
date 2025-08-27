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
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('type');
            $table->integer('brewery');
            $table->float('abv');
            $table->float('ibu');
            $table->string('unique_id', 30);
            $table->integer('data_source');
            $table->dateTime('last_reviewed');
            $table->string('info_url', 250);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beers');
    }
};
