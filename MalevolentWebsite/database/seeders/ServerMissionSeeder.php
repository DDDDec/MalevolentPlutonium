<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerMissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time = now();

        $achievements = [
            ['mission_name' => '500 Kills', 'mission_description' => "Kill 500 zombies", 'mission_statistic_name' => 'user_kills', 'mission_reward' => 5000, 'mission_amount' => 5000, 'mission_type' => 'daily', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '2500 Kills', 'mission_description' => "Kill 2500 zombies", 'mission_statistic_name' => 'user_kills', 'mission_reward' => 12500, 'mission_amount' => 12500, 'mission_type' => 'weekly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '25000 Kills', 'mission_description' => "Kill 25000 zombies", 'mission_statistic_name' => 'user_kills', 'mission_reward' => 50000, 'mission_amount' => 50000, 'mission_type' => 'biweekly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '75000 Kills', 'mission_description' => "Kill 75000 zombies", 'mission_statistic_name' => 'user_kills', 'mission_reward' => 125000, 'mission_amount' => 125000, 'mission_type' => 'monthly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '500 Downs', 'mission_description' => "Kill 500 zombies", 'mission_statistic_name' => 'user_downs', 'mission_reward' => 5000, 'mission_amount' => 5000, 'mission_type' => 'daily', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '2500 Downs', 'mission_description' => "Kill 2500 zombies", 'mission_statistic_name' => 'user_downs', 'mission_reward' => 12500, 'mission_amount' => 12500, 'mission_type' => 'weekly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '25000 Downs', 'mission_description' => "Kill 25000 zombies", 'mission_statistic_name' => 'user_downs', 'mission_reward' => 50000, 'mission_amount' => 50000, 'mission_type' => 'biweekly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '75000 Downs', 'mission_description' => "Kill 75000 zombies", 'mission_statistic_name' => 'user_downs', 'mission_reward' => 125000, 'mission_amount' => 125000, 'mission_type' => 'monthly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '500 Revives', 'mission_description' => "Kill 500 zombies", 'mission_statistic_name' => 'user_revives', 'mission_reward' => 5000, 'mission_amount' => 5000, 'mission_type' => 'daily', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '2500 Revives', 'mission_description' => "Kill 2500 zombies", 'mission_statistic_name' => 'user_revives', 'mission_reward' => 12500, 'mission_amount' => 12500, 'mission_type' => 'weekly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '25000 Revives', 'mission_description' => "Kill 25000 zombies", 'mission_statistic_name' => 'user_revives', 'mission_reward' => 50000, 'mission_amount' => 50000, 'mission_type' => 'biweekly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '75000 Revives', 'mission_description' => "Kill 75000 zombies", 'mission_statistic_name' => 'user_revives', 'mission_reward' => 125000, 'mission_amount' => 125000, 'mission_type' => 'monthly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '500 Headshots', 'mission_description' => "Kill 500 zombies", 'mission_statistic_name' => 'user_headshots', 'mission_reward' => 5000, 'mission_amount' => 5000, 'mission_type' => 'daily', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '2500 Headshots', 'mission_description' => "Kill 2500 zombies", 'mission_statistic_name' => 'user_headshots', 'mission_reward' => 12500, 'mission_amount' => 12500, 'mission_type' => 'weekly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '25000 Headshots', 'mission_description' => "Kill 25000 zombies", 'mission_statistic_name' => 'user_headshots', 'mission_reward' => 50000, 'mission_amount' => 50000, 'mission_type' => 'biweekly', 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '75000 Headshots', 'mission_description' => "Kill 75000 zombies", 'mission_statistic_name' => 'user_headshots', 'mission_reward' => 125000, 'mission_amount' => 125000, 'mission_type' => 'monthly', 'created_at' => $time, 'updated_at' => $time],
        ];

        DB::transaction(function () use ($achievements) {
            DB::table('server_missions')->insert($achievements);
        });
    }
}
