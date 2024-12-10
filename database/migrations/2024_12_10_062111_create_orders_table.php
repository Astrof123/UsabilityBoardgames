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
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->foreign('user_id')->references('id')->on('users');
            $table->foreignId('boardgame_id')->foreign('boardgame_id')->references('id')->on('boardgames');
            $table->unsignedInteger('amount')->default(1);
            $table->foreignId('status_id')->foreign('status_id')->references('id')->on('order_statuses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_statuses');
        Schema::dropIfExists('orders');
    }
};
