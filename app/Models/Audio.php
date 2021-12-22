<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'Audios';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
}
