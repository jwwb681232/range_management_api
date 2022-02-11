<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
}
