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
            return ModelsNewspaper::all()->sortByDesc('created_at')->take(4);
        });

        return view('livewire.content.homepage.newspaper', [
            'newspapers' => $newspapers,
        ]);
    }
}
