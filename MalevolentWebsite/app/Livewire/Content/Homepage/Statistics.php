<?php

namespace App\Livewire\Content\Homepage;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\UserStatistics;

class Statistics extends Component
{
    public function render()
    {
        $userStatistics = Cache::remember('content.homepage.statistics', 300, function () {
            return [
                'statistics' => UserStatistics::selectRaw('
                    COALESCE(SUM(user_money), 0) as moneys,
                    COALESCE(SUM(user_prestige), 0) as prestiges,
                    COALESCE(SUM(user_level), 0) as levels,
                    COALESCE(SUM(user_kills), 0) as kills,
                    COALESCE(SUM(user_downs), 0) as downs,
                    COALESCE(SUM(user_revives), 0) as revives,
                    COALESCE(SUM(user_headshots), 0) as headshots,
                    COALESCE(SUM(user_boss_kills), 0) as bosses,
                    COALESCE(SUM(user_missions_completed), 0) as missions,
                    COALESCE(SUM(user_chat_games_won), 0) as chatgames,
                    COALESCE(SUM(user_achievements_completed), 0) as achievements,
                    COALESCE(SUM(user_gambled_lost), 0) as lostgambling,
                    COALESCE(SUM(user_gambled_won), 0) as wongambling,
                    COALESCE(SUM(user_interest_gained), 0) as interest,
                    COALESCE(SUM(user_vaults_cracked), 0) as vaults,
                    COUNT(*) as users,
                    COALESCE(SUM(user_banned), 0) as bans
                ')->first(),
            ];
        });

        return view('livewire.content.homepage.statistics', [
            'userStatistics' => $userStatistics,
        ]);
    }
}
