<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;

    protected $table = 'Cards';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];

    public function user()
    {
        return $this->hasOne(User::class,'card_id','id');
    }
}
