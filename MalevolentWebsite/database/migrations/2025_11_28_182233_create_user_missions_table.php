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
        Schema::create('user_missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id');
            $table->unsignedBigInteger('user_id');
            $table->string('mission_name');
            $table->string('mission_statistic');
            $table->integer('mission_statistic_amount')->default(0);
            $table->integer('mission_statistic_progress')->default(0);
            $table->integer('mission_reward')->default(0);
            $table->boolean('mission_completed')->default(false);
            $table->enum('mission_type', ['daily', 'weekly', 'biweekly', 'monthly'])->default('daily');
            $table->dateTime('reset_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_missions');
    }
};
