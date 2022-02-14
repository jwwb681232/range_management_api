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

    const GROUP           = 1;
    const INDIVIDUAL      = 2;
    const MANUAL_TRAINING = 3;
    const RCH             = 4;
    public static $typeMap = [
        self::GROUP           => 'Group',
        self::INDIVIDUAL      => 'Individual',
        self::MANUAL_TRAINING => 'Manual Training',
        self::RCH             => 'Remote Control Handset mode',
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
