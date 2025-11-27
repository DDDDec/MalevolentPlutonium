<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerAchievements extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'achievement_name',
        'achievement_description',
        'achievement_statistic_name',
        'achievement_reward'
    ];
}
