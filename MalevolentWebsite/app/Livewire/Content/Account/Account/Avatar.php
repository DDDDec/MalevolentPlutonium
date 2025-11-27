<?php

namespace App\Livewire\Content\Account\Account;

use Livewire\Component;
use App\Models\UserStatistics;

class Avatar extends Component
{
    public $user;

    public function render()
    {
        $statistics = UserStatistics::where('user_id', $this->user->id)->first();

        return view('livewire.content.account.account.avatar', [
            'statistics' => $statistics
        ]);
    }
}
