<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;
    public static $statusMap = [
        self::STATUS_ACTIVE   => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
    ];

    protected $table = 'units';
    protected $primaryKey = 'id';
    protected $guarded = ['_token'];
}
