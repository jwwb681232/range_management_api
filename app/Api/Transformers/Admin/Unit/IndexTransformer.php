<?php

namespace App\Api\Transformers\Admin\Unit;

use App\CacheKeys;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class IndexTransformer
{
    public static function transform(Collection $collection)
    {
        $data = [];

        foreach ($collection as $item) {
            $data[] = [
                'id'         => $item->id,
                'name'       => $item->name,
                'status'     => $item->status,
                'created_at' => $item->created_at->toDateTimeString(),
            ];
        }

        return $data;
    }
}
