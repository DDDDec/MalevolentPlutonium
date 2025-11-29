<?php

namespace App\Livewire\Content\Account\Profile;

use App\Models\ServerAchievements;
use App\Models\User;
use App\Models\UserAchievement;
use Livewire\Component;

class Achievement extends Component
{
    public string $name;

    public function render()
    {
        $user = User::where('name', $this->name)->first();
        $serverAchievements = ServerAchievements::all() ?? [];
        $userAchievements = UserAchievement::where('user_id', $user->id)->get()->toArray() ?? [];

        return view('livewire.content.account.profile.achievement', [
            'achievements' => $serverAchievements,
            'userAchievements' => $userAchievements
        ]);
    }
}
