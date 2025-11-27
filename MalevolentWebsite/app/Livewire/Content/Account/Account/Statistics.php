<?php

namespace App\Livewire\Content\Account\Account;

use Livewire\Component;

class Statistics extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.content.account.account.statistics');
    }
}
