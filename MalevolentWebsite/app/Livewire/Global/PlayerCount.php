<?php

namespace App\Livewire\Global;

use App\Models\Server;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class PlayerCount extends Component
{
    public function render()
    {
        $playerCount = Cache::remember('content.homepage.player.count', 300, function () {
            return Server::sum('server_player_count');
        });

        return view('livewire.global.player-count', [
            'playerCount' => $playerCount
        ]);
    }
}
