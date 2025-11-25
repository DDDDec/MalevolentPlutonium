<?php

namespace App\Livewire\Content\Store;

use Livewire\Component;

use App\Models\UserStatistics;

class Wallet extends Component
{
    public function render()
    {
        $user = auth()->user();
        $userMoney = UserStatistics::where('id', $user->id)->first();

        return view('livewire.content.store.wallet', [
            'money' => $userMoney->user_money
        ]);
    }
}
