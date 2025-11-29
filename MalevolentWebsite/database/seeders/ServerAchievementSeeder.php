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
            ['achievement_name' => '5k Kills', 'achievement_description' => "Kill 5k zombies", 'achievement_statistic_name' => 'user_kills', 'achievement_reward' => 5000, 'achievement_amount' => 5000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '20k Kills', 'achievement_description' => "Kill 20k zombies", 'achievement_statistic_name' => 'user_kills', 'achievement_reward' => 12500, 'achievement_amount' => 12500, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '75k Kills', 'achievement_description' => "Kill 75k zombies", 'achievement_statistic_name' => 'user_kills', 'achievement_reward' => 75000, 'achievement_amount' => 75000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '200k Kills', 'achievement_description' => "Kill 200k zombies", 'achievement_statistic_name' => 'user_kills', 'achievement_reward' => 125000, 'achievement_amount' => 125000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '5k Downs', 'achievement_description' => "Kill 5k zombies", 'achievement_statistic_name' => 'user_downs', 'achievement_reward' => 5000, 'achievement_amount' => 5000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '20k Downs', 'achievement_description' => "Kill 20k zombies", 'achievement_statistic_name' => 'user_downs', 'achievement_reward' => 12500, 'achievement_amount' => 12500, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '75k Downs', 'achievement_description' => "Kill 75k zombies", 'achievement_statistic_name' => 'user_downs', 'achievement_reward' => 75000, 'achievement_amount' => 75000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '200k Downs', 'achievement_description' => "Kill 200k zombies", 'achievement_statistic_name' => 'user_downs', 'achievement_reward' => 125000, 'achievement_amount' => 125000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '5k Revives', 'achievement_description' => "Kill 5k zombies", 'achievement_statistic_name' => 'user_revives', 'achievement_reward' => 5000, 'achievement_amount' => 5000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '20k Revives', 'achievement_description' => "Kill 20k zombies", 'achievement_statistic_name' => 'user_revives', 'achievement_reward' => 12500, 'achievement_amount' => 12500, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '75k Revives', 'achievement_description' => "Kill 75k zombies", 'achievement_statistic_name' => 'user_revives', 'achievement_reward' => 75000, 'achievement_amount' => 75000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '200k Revives', 'achievement_description' => "Kill 200k zombies", 'achievement_statistic_name' => 'user_revives', 'achievement_reward' => 125000, 'achievement_amount' => 125000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '5k Headshots', 'achievement_description' => "Kill 5k zombies", 'achievement_statistic_name' => 'user_headshots', 'achievement_reward' => 5000, 'achievement_amount' => 5000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '20k Headshots', 'achievement_description' => "Kill 20k zombies", 'achievement_statistic_name' => 'user_headshots', 'achievement_reward' => 12500, 'achievement_amount' => 12500, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '75k Headshots', 'achievement_description' => "Kill 75k zombies", 'achievement_statistic_name' => 'user_headshots', 'achievement_reward' => 75000, 'achievement_amount' => 75000, 'created_at' => $time, 'updated_at' => $time],
            ['achievement_name' => '200k Headshots', 'achievement_description' => "Kill 200k zombies", 'achievement_statistic_name' => 'user_headshots', 'achievement_reward' => 125000, 'achievement_amount' => 125000, 'created_at' => $time, 'updated_at' => $time],
        ];

        DB::transaction(function () use ($achievements) {
            DB::table('server_achievements')->insert($achievements);
        });
    }
}
