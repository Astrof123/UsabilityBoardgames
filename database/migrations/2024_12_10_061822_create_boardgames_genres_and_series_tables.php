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
        Schema::dropIfExists('boardgames');

        Schema::create('boardgame_series', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('boardgames', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('min_player')->default(1);
            $table->unsignedInteger('max_player')->nullable();
            $table->decimal('price', total: 10, places: 2)->nullable();
            $table->text('full_description')->nullable();
            $table->text('mini_description')->nullable();
            $table->text('rules')->nullable();
            $table->foreignId('series_id')->foreign('series_id')->references('id')->on('boardgame_series');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('boardgame_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boardgames_id')->foreign('series_id')->references('id')->on('boardgames');
            $table->string('path');
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('boardgames_genres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boardgames_id')->foreign('boardgame_id')->references('id')->on('boardgames');
            $table->foreignId('genre_id')->foreign('genre_id')->references('id')->on('genres');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boardgame_series');
        Schema::dropIfExists('boardgames');
        Schema::dropIfExists('boardgame_images');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('boardgames_genres');
    }
};
