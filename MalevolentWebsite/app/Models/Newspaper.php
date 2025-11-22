<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'newspaper_title',
        'newspaper_short_description',
        'newspaper_long_description',
        'newspaper_avatar',
        'newspaper_author',
    ];
}
