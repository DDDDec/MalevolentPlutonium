<?php

namespace App\Livewire\Content\Account\Account;

use App\Models\ServerAchievements;
use App\Models\UserAchievement;
use App\Models\UserStatistics;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Achievement extends Component
{
    public $user;

    public function achievement($id)
    {
        $achievement = ServerAchievements::findOrFail($id);

        $alreadyClaimed = UserAchievement::where('user_id', $this->user->id)
            ->where('achievement_id', $id)
            ->exists();

        if ($alreadyClaimed) {
            return;
        }

        $userStatistics = UserStatistics::where('user_name', $this->user->name)->first();
        $currentProgress = $userStatistics?->{$achievement->achievement_statistic_name} ?? 0;

        if ($currentProgress < $achievement->achievement_amount) {
            return;
        }

        UserAchievement::create([
            'user_id' => $this->user->id,
            'achievement_id' => $id,
        ]);

        UserStatistics::increment('user_money', $achievement->achievement_reward);

        Cache::forget("user.achievements." . $this->user->name);
    }

    public function render()
    {
        $achievements = Cache::remember("server.achievements", 300, function () {
            return ServerAchievements::all();
        });

        $userStatistics = Cache::remember("user.statistics.".$this->user->name, 300, function () {
            return UserStatistics::where('user_name', $this->user->name)->first();
        });

        $userAchievements = Cache::remember("user.achievements.".$this->user->name, 300, function () {
            return UserAchievement::where('user_id', $this->user->id)->pluck('achievement_id')->toArray();
        }) ?? [];

        return view('livewire.content.account.account.achievement', [
            'achievements' => $achievements,
            'userStatistics' => $userStatistics,
            'userAchievements' => $userAchievements
        ]);
    }
}
