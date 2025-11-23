<?php

namespace App\Livewire\Content\Homepage;

use Livewire\Component;

class Serverlist extends Component
{
    public array $servers = [];

    public function mount(): void
    {
        $serverConfigs = config('malevolent.servers', []);
    }

    public function render()
    {
        return view('livewire.content.homepage.serverlist', [
            'servers' => $this->servers,
        ]);
    }
}
