<?php

namespace App\Livewire\Content\Account\Account;

use App\Models\UserStatistics;
use Livewire\Component;

class Statistics extends Component
{
    public $user;

    public function render()
    {
        $statistics = UserStatistics::where('user_id', $this->user->id)->first();

        return view('livewire.content.account.account.statistics', [
            'statistics' => $statistics
        ]);
    }
}
