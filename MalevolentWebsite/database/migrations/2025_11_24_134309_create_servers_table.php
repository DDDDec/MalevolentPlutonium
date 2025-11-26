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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('server_ip');
            $table->integer('server_port')->unique();
            $table->integer('server_player_count')->default(0)->index();
            $table->integer('server_max_player_count')->default(0);
            $table->integer('server_round')->default(0);
            $table->integer('server_kills')->default(0);
            $table->integer('server_downs')->default(0);
            $table->integer('server_revives')->default(0);
            $table->integer('server_headshots')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
