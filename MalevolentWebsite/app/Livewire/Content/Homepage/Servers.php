<?php

namespace App\Livewire\Content\Homepage;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

use App\Models\Server;

class Servers extends Component
{
    public function render()
    {
        $servers = Cache::remember('content.homepage.serverlist', 300, function () {
            $config = config('malevolent.servers', []);

            $request = Http::pool(function ($pool) use ($config) {
                foreach ($config as $server) {
                    $pool->get("https://getserve.rs/server/{$server['ip']}/{$server['port']}/json");
                }
            });

            foreach ($request as $url => $response) {
                $servers[$url] = $response->json();

                Server::updateOrCreate(
                    ['server_port' => $servers[$url]['port']],
                    [
                        'server_ip' => $servers[$url]['ip'],
                        'server_port' => $servers[$url]['port'],
                        'server_player_count' => $servers[$url]['realClients'],
                        'server_max_player_count' => $servers[$url]['maxplayers'],
                        'server_round' => $servers[$url]['round']
                    ]
                );
            }

            return Server::all()->sortByDesc('server_player_count');
        });

        $playerCount = Cache::remember('content.homepage.player.count', 300, function () {
            return Server::sum('server_player_count');
        });

        return view('livewire.content.homepage.servers', [
            'servers' => $servers
        ]);
    }
}
