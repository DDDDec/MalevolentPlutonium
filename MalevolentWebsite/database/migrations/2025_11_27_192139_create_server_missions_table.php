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
        Schema::create('server_missions', function (Blueprint $table) {
            $table->id();
            $table->string('mission_name');
            $table->string('mission_description');
            $table->string('mission_statistic_name');
            $table->integer('mission_reward')->default(0);
            $table->integer('mission_amount')->default(0);
            $table->enum('mission_type', ['daily', 'weekly', 'biweekly', 'monthly'])->default('daily');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_missions');
    }
};
