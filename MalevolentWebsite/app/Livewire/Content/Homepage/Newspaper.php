<?php

namespace App\Livewire\Content\Homepage;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\Newspaper as ModelsNewspaper;

class Newspaper extends Component
{
    public function render()
    {
        $newspapers = Cache::remember('content.homepage.newspaper', 300, function () {
            return ModelsNewspaper::orderByDesc('created_at')
                ->limit(4)
                ->get();
        });

        return view('livewire.content.homepage.newspaper', [
            'newspapers' => $newspapers,
        ]);
    }
}
