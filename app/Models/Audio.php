<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Audio extends Model
{
    use SoftDeletes;

    protected $table = 'audios';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];

    public function getPathAttribute($value)
    {
        return asset($value);
    }
}
