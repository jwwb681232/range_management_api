<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scenario extends Model
{
    use SoftDeletes;

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

    public function lights()
    {
        return $this->belongsToMany(Light::class, 'scenario_light', 'scenario_id', 'light_id')->withPivot('preset', 'start_at', 'duration');
    }
}
