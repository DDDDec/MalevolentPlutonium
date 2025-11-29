<?php

namespace App\Livewire\Content\Account\Profile;

use App\Models\UserActions;
use Livewire\Component;

class Activity extends Component
{
    public $name;

    public function render()
    {
        $activitys = UserActions::search('user_name', $this->name)->orderBy('created_at', 'desc')->limit(5)->get();

        return view('livewire.content.account.profile.activity', [
            'activitys' => $activitys
        ]);
    }
}
