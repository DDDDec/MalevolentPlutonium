<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerVaults extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'vault_code',
        'vault_money'
    ];
}
