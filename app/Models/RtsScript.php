<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RtsScript extends Model
{
    protected $table = 'rts_scripts';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];

    protected $casts = [
        'steps'        => 'json',
        'participants' => 'json',
    ];
}
