<?php

namespace App\Livewire\Content\Account\Account;

use App\Models\UserActions;
use Livewire\Component;

class Activity extends Component
{
    public $user;

    public function render()
    {
        $activitys = UserActions::search('user_name', $this->user->name)->orderBy('created_at', 'desc')->limit(5)->get();

        return view('livewire.content.account.account.activity', [
            'activitys' => $activitys
        ]);
    }
}
