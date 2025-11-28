<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ServerAchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time = now();

        $achievements = [
            ['achievement_name' => '5000 Kills', 'achievement_description' => "Kill 5000 zombies", 'achievement_statistic_name' => 'user_kills', 'achievement_reward' => 5000, 'achievement_amount' => 5000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '20000 Kills', 'achievement_description' => "Kill 20000 zombies", 'achievement_statistic_name' => 'user_kills', 'achievement_reward' => 12500, 'achievement_amount' => 12500, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '75000 Kills', 'achievement_description' => "Kill 75000 zombies", 'achievement_statistic_name' => 'user_kills', 'achievement_reward' => 75000, 'achievement_amount' => 75000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '200000 Kills', 'achievement_description' => "Kill 200000 zombies", 'achievement_statistic_name' => 'user_kills', 'achievement_reward' => 125000, 'achievement_amount' => 125000, 'created_at' => $time, 'updated_at' => $time],
        ];

        DB::transaction(function () use ($achievements) {
            DB::table('server_achievements')->insert($achievements);
        });
    }
}
