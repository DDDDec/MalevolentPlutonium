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
            $table->foreignId('user_id')->primary();
            $table->string('user_name')->unique();
            $table->integer('user_rank')->default(0);
            $table->integer('user_prestige')->default(0);
            $table->integer('user_level')->default(1);
            $table->integer('user_color')->default("7");
            $table->integer('user_banned')->default(0);
            $table->unsignedBigInteger('user_money')->default(100000)->index();
            $table->integer('user_code')->nullable();

            $table->integer('user_joins')->default(0)->index();
            $table->integer('user_quits')->default(0)->index();
            $table->integer('user_kills')->default(0)->index();
            $table->integer('user_downs')->default(0)->index();
            $table->integer('user_revives')->default(0)->index();
            $table->integer('user_headshots')->default(0)->index();
            $table->integer('user_distance')->default(0)->index();
            $table->integer('user_dog_kills')->default(0)->index();

            $table->integer('user_boss_kills')->default(0)->index();
            $table->integer('user_missions_completed')->default(0)->index();
            $table->integer('user_chat_games_won')->default(0)->index();
            $table->integer('user_achievements_completed')->default(0)->index();
            $table->integer('user_gambled')->default(0)->index();
            $table->integer('user_gambled_lost')->default(0)->index();
            $table->integer('user_gambled_won')->default(0)->index();
            $table->integer('user_interest_gained')->default(0)->index();
            $table->integer('user_vaults_cracked')->default(0)->index();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
