<?php

namespace App\Livewire\Content\Homepage;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\Server;

class Servers extends Component
{
    public function render()
    {
        $servers = Cache::remember('content.homepage.serverlist', 300, function () {
            return Server::all()->sortByDesc('server_player_count');
        });

        return view('livewire.content.homepage.servers');
    }
}
