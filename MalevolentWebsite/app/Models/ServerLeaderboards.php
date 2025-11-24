<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerLeaderboards extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'leaderboard_map',
        'leaderboard_players',
        'leaderboard_round',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
