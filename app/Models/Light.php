<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    protected $table = 'lights';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
}
