<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];

    protected $casts = [
        'trainees' => 'json',
    ];

    public function scenario()
    {
        return $this->hasOne(Scenario::class,'id','scenario_id');
    }

    public function rtsScript()
    {
        return $this->hasOne(RtsScript::class,'id','rts_script_id');
    }
}
