<?php

namespace App\Livewire\Content\Account\Profile;

use App\Models\User;
use App\Models\UserStatistics;
use Livewire\Component;

class Avatar extends Component
{
    public $name;

    public function render()
    {
        $user = User::where('name', $this->name)->first()->name;
        $statistics = UserStatistics::where('user_name', $user)->first();

        return view('livewire.content.account.profile.avatar', [
            'statistics' => $statistics
        ]);
    }
}
