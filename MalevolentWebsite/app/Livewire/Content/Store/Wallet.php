<?php

namespace App\Livewire\Content\Store;

use Livewire\Component;

use App\Models\UserStatistics;

class Wallet extends Component
{
    public function render()
    {
        $user = auth()->user();
        $userMoney = UserStatistics::where('user_id', $user->id ?? 0)->first()->user_money ?? 0;

        return view('livewire.content.store.wallet', [
            'money' => $userMoney
        ]);
    }
}
