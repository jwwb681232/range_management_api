<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    protected $table = 'doors';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
    protected $hidden = ['pivot'];
}
