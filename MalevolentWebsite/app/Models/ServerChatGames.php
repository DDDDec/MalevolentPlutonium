<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerChatGames extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'chat_game_name',
        'chat_game_answer',
        'chat_game_reward'
    ];
}
