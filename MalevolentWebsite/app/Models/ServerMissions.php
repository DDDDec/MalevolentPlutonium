<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerMissions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'mission_name',
        'mission_description',
        'mission_statistic_name',
        'mission_reward'
    ];
}
