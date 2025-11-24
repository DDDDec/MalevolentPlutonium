<?php

namespace App\Livewire\Content\Homepage;

use App\Models\UserActions as UserActionsModel;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class UserActions extends Component
{
    public function render()
    {
        $userActions = Cache::remember('content.homepage.user-actions', 300, function () {
            return UserActionsModel::all()->sortByDesc('created_at')->take(5);
        });

        return view('livewire.content.homepage.user-actions', [
            'userActions' => $userActions,
        ]);
    }
}
