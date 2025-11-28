<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerChatGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time = now();

        $chatGames = [
            ['chat_game_name' => 'What is 1 + 1?', 'chat_game_answer' => 2, 'chat_game_reward' => 5000, 'created_at' => $time, 'updated_at' => $time],
            ['chat_game_name' => 'What is 1 + 2?', 'chat_game_answer' => 3, 'chat_game_reward' => 6000, 'created_at' => $time, 'updated_at' => $time],
            ['chat_game_name' => 'What is 1 + 3?', 'chat_game_answer' => 4, 'chat_game_reward' => 7000, 'created_at' => $time, 'updated_at' => $time],
            ['chat_game_name' => 'What is 1 + 4?', 'chat_game_answer' => 5, 'chat_game_reward' => 8000, 'created_at' => $time, 'updated_at' => $time],
        ];

        DB::transaction(function () use ($chatGames) {
            DB::table('server_chat_games')->insert($chatGames);
        });
    }
}
