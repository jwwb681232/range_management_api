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

    public function doors()
    {
        return $this->belongsToMany(Door::class, 'rts_script_door', 'rts_script_id', 'door_id');
    }

    public function cameras()
    {
        return $this->belongsToMany(Camera::class, 'rts_script_camera', 'rts_script_id', 'channel_code',null,'channel_code');
    }
}
