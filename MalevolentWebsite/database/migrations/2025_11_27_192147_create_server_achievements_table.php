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
        Schema::create('server_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('achievement_name');
            $table->string('achievement_description');
            $table->string('achievement_statistic_name');
            $table->integer('achievement_reward')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_achievements');
    }
};
