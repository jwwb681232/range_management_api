<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;
    public static $statusMap = [
        self::STATUS_ACTIVE   => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
    ];

    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $guarded    = ['_token'];
    protected $hidden     = ['password', 'remember_token',];
    protected $casts      = ['email_verified_at' => 'datetime',];

    public function modes()
    {
        return $this->belongsToMany(Mode::class,'user_mode','user_id','mode_id')->withPivot('abilities');
    }

    public function card()
    {
        return $this->hasOne(Card::class,'id','card_id');
    }

    public function unit()
    {
        return $this->hasOne(Unit::class,'id','unit_id');
    }
}
