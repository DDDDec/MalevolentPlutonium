<?php

namespace App\Livewire\Content\Store;

use App\Models\UserStatistics;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Ranks extends Component
{
    public function purchase(int $rank): void
    {
        $config = config('malevolent.ranks', []);

        if (!array_key_exists($rank, $config)) {
            session()->flash('error', 'Invalid color selected.');
            return;
        }

        $cost = is_array($config[$rank]) ? $config[$rank][0] : $config[$rank];

        $authUser = Auth::user();
        if (!$authUser) {
            session()->flash('error', 'You must be logged in to purchase a rank.');
            return;
        }

        $user = UserStatistics::where('user_id', $authUser->id)->first();

        if (!$user) {
            session()->flash('error', 'User statistics not found.');
            return;
        }

        if ($user->user_money < $cost) {
            session()->flash('error', 'You do not have enough money to purchase this color.');
            return;
        }

        $user->user_money -= $cost;
        $user->user_rank = $rank;
        $user->save();

        session()->flash('success', 'You have successfully purchased this rank.');
    }

    public function render()
    {
        $user = Auth::user();
        $currentRank = UserStatistics::where('user_id', $user->id ?? 0)->first()->user_rank ?? 0;

        return view('livewire.content.store.ranks',  [
            'rank' => $currentRank
        ]);
    }
}
