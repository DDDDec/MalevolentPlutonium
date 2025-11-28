<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'mission_id',
        'mission_name',
        'mission_statistic',
        'mission_statistic_amount',
        'mission_statistic_progress',
        'mission_reward',
        'mission_completed',
        'mission_type',
        'reset_at',
    ];
}
