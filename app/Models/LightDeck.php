<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LightDeck extends Model
{
    protected $table = 'light_decks';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
}
