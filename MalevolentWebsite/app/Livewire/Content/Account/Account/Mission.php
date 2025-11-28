<?php

namespace App\Livewire\Content\Account\Account;

use App\Models\ServerMissions;
use App\Models\UserMission;
use App\Models\UserStatistics;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Mission extends Component
{
    public $user;

    public function mission($missionID)
    {
        $userStatistics = UserStatistics::where('user_id', $this->user->id)->first();
        $mission = UserMission::where('mission_id', $missionID)->where('user_id', $this->user->id)->first();

        if ($userStatistics->{$mission->mission_statistic} >= $mission->mission_statistic_progress && !$mission->mission_completed)
        {
            UserStatistics::where('user_id', $this->user->id)->increment('user_money', $mission->mission_reward);
            UserMission::where('mission_id', $missionID)->where('user_id', $this->user->id)->update(['mission_completed' => true]);
            Cache::forget("user.statistics.".$this->user->name);
        }
    }

    public function giveNewMission() {
        $userStatistics = UserStatistics::where('user_id', $this->user->id)->first();
        $now = Carbon::now();
        $missionTypes = ['daily', 'weekly', 'biweekly', 'monthly'];

        foreach ($missionTypes as $type) {
            $expiredMissions = UserMission::where('user_id', $this->user->id)
                ->where('mission_type', $type)
                ->where('reset_at', '<', $now)
                ->get();

            if ($expiredMissions->isNotEmpty()) {
                $newMissions = ServerMissions::where('mission_type', $type)
                    ->inRandomOrder()
                    ->limit($expiredMissions->count())
                    ->get();

                $resetAt = match ($type) {
                    'daily' => Carbon::now()->addDay(),
                    'weekly' => Carbon::now()->addWeek(),
                    'biweekly' => Carbon::now()->addWeek(2),
                    'monthly' => Carbon::now()->addMonth(),
                    default => Carbon::now()->addDay(),
                };

                foreach ($expiredMissions as $index => $userMission) {
                    $newMission = $newMissions[$index] ?? null;

                    if ($newMission) {
                        $userMission->update([
                            'mission_id' => $newMission->id,
                            'mission_name' => $newMission->mission_name,
                            'mission_statistic' => $newMission->mission_statistic,
                            'mission_statistic_amount' => $newMission->mission_statistic_amount,
                            'mission_statistic_progress' => $userStatistics->{$newMission->mission_statistic},
                            'mission_reward' => $newMission->mission_reward,
                            'mission_type' => $newMission->mission_type,
                            'mission_completed' => false,
                            'reset_at' => $resetAt,
                        ]);
                    }
                }
            }
        }
    }

    public function render()
    {
        self::giveNewMission();

        $missions = UserMission::where('user_id', $this->user->id)->get();
        $userStatistics = UserStatistics::where('user_id', $this->user->id)->first();

        return view('livewire.content.account.account.mission', [
            'missions' => $missions,
            'userStatistics' => $userStatistics
        ]);
    }
}
