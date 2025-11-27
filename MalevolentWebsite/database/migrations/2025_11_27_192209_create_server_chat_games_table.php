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
        Schema::create('server_chat_games', function (Blueprint $table) {
            $table->id();
            $table->string('chat_game_name');
            $table->string('chat_game_answer');
            $table->integer('chat_game_reward')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_chat_games');
    }
};
