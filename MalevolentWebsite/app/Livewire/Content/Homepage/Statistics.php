<?php

namespace App\Livewire\Content\Homepage;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\UserStatistics;

class Statistics extends Component
{
    public function render()
    {
        $userStatistics = Cache::remember('content.homepage.statistics', 300, function () {
            return UserStatistics::all()->sortByDesc('created_at')->take(5);
        });

        return view('livewire.content.homepage.statistics', [
            'userStatistics' => $userStatistics,
        ]);
    }
}
