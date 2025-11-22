<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatistics extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'user_name',
        'user_rank',
        'user_prestige',
        'user_level',
        'user_color',
        'user_banned',
        'user_money',
        'user_code',

        'user_joins',
        'user_quits',
        'user_kills',
        'user_downs',
        'user_revives',
        'user_headshots',
        'user_distance',
        'user_dog_kills',

        'user_boss_kills',
        'user_missions_completed',
        'user_chat_games_won',
        'user_gambled',
        'user_gambled_lost',
        'user_gambled_won',
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
