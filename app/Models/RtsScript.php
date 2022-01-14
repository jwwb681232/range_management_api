<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RtsScript extends Model
{
    use SoftDeletes;

    protected $table = 'rts_scripts';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];

    protected $casts = [
        'steps'        => 'json',
        'participants' => 'json',
    ];
}
