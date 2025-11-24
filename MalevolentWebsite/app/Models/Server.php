<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'server_ip',
        'server_port',
        'server_player_count',
        'server_max_player_count',
        'server_round',
        'server_kills',
        'server_downs',
        'server_revives',
        'server_headshots',
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
