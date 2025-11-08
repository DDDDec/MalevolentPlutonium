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
        Schema::create('user_statistics', function (Blueprint $table) {
            $table->foreignId('id')->primary();
            $table->string('name')->unique();
            $table->integer('player_rank')->default(0);
            $table->integer('player_prestige')->default(0);
            $table->integer('player_level')->default(1);
            $table->integer('player_color')->default("7");
            $table->integer('player_banned')->default(0);
            $table->bigInteger('player_money')->default(100000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_statistics');
    }
};
