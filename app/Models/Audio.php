<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];

    public function getPathAttribute($value)
    {
        return asset($value);
    }
}
