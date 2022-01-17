<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LightFolder extends Model
{
    protected $table = 'light_folders';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
}
