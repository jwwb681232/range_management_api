<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    protected $table = 'modes';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
    protected $hidden = ['pivot'];
}
