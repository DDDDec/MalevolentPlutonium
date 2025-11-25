<?php

namespace App\Livewire\Content\Store;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\UserStatistics;

class Colors extends Component
{
    public function purchase(int $color): void
    {
        $config = config('malevolent.colors', []);

        if (!array_key_exists($color, $config)) {
            session()->flash('error', 'Invalid color selected.');
            return;
        }

        $cost = is_array($config[$color]) ? $config[$color][0] : $config[$color];

        $authUser = Auth::user();
        if (!$authUser) {
            session()->flash('error', 'You must be logged in to purchase a color.');
            return;
        }

        $user = UserStatistics::where('id', $authUser->id)->first();

        if (!$user) {
            session()->flash('error', 'User statistics not found.');
            return;
        }

        if ($user->user_money < $cost) {
            session()->flash('error', 'You do not have enough money to purchase this color.');
            return;
        }

        $user->user_money -= $cost;
        $user->user_color = $color;
        $user->save();

        session()->flash('success', 'You have successfully purchased this color.');
    }


    public function render()
    {
        $user = Auth::user();
        $currentColor = UserStatistics::where('id', $user->id ?? 0)->first()->user_color ?? 7;

        return view('livewire.content.store.colors', [
            'color' => $currentColor,
        ]);
    }
}
