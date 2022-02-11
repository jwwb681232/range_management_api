<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    protected $table = 'cameras';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
    protected $hidden = ['pivot'];
}
