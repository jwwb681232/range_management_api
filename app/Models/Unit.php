<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

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
