<?php

namespace App\Livewire\Content\Homepage;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\Serverlist as ServerlistModel;

class Serverlist extends Component
{
    public function render()
    {
        $serverlist = Cache::remember('content.homepage.serverlist', 300, function () {
            return ServerlistModel::all()->sortByDesc('server_player_count');
        });

        return view('livewire.content.homepage.serverlist', [
            'serverlist' => $serverlist,
        ]);
    }
}
