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
            ['mission_name' => '500 Kills', 'mission_description' => "Kill 500 zombies", 'mission_statistic_name' => 'user_kills', 'mission_reward' => 5000, 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '2500 Kills', 'mission_description' => "Kill 2500 zombies", 'mission_statistic_name' => 'user_kills', 'mission_reward' => 12500, 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '25000 Kills', 'mission_description' => "Kill 25000 zombies", 'mission_statistic_name' => 'user_kills', 'mission_reward' => 50000, 'created_at' => $time, 'updated_at' => $time],
            ['mission_name' => '75000 Kills', 'mission_description' => "Kill 75000 zombies", 'mission_statistic_name' => 'user_kills', 'mission_reward' => 125000, 'created_at' => $time, 'updated_at' => $time],
        ];

        DB::transaction(function () use ($achievements) {
            DB::table('server_missions')->insert($achievements);
        });
    }
}
