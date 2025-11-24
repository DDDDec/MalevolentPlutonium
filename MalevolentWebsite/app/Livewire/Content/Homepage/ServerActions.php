<?php

namespace App\Livewire\Content\Homepage;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\ServerActions as ServerActionsModel;

class ServerActions extends Component
{
    public function render()
    {
        $serverActions = Cache::remember('content.homepage.server-actions', 300, function () {
            return ServerActionsModel::all()->sortByDesc('created_at')->take(5);
        });

        return view('livewire.content.homepage.server-actions', [
            'serverActions' => $serverActions,
        ]);
    }
}
