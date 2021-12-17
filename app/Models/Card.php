<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'Cards';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
}
