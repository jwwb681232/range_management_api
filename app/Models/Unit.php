<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    const STATUS_ACTIVE   = 'Active';
    const STATUS_INACTIVE = 'Inactive';
    public static $statusMap = [
        self::STATUS_ACTIVE   => 1,
        self::STATUS_INACTIVE => 0,
    ];

    protected $table = 'units';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
}
