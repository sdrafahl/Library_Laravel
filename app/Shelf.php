<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shelf extends Model
{
    protected $fillable = [
        'name'
    ];
}
