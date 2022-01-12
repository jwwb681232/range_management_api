<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $table = 'scenarios';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];

    public function rtsScript()
    {
        return $this->hasOne(RtsScript::class,'id','rts_script_id');
    }

    public function audios()
    {
        return $this->belongsToMany(Audio::class,'scenario_audio','scenario_id','audio_id')->withPivot('start_at', 'duration');
    }
}
