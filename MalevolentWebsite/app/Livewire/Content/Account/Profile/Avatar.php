<?php

namespace App\Livewire\Content\Account\Profile;

use App\Models\UserStatistics;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Avatar extends Component
{
    public $name;

    public function render()
    {
        $statistics = Cache::remember('account.account.profile.statistics'.$this->name, 300, function () {
            return UserStatistics::where('user_name', $this->name)->first();
        });

        return view('livewire.content.account.profile.avatar', [
            'statistics' => $statistics
        ]);
    }
}
