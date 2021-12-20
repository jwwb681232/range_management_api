<?php

namespace App\Api\Transformers\Admin\Card;

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
                'number'     => $item->number,
                'user'       => $item->user
                    ? [
                        'unit'  => $item->user?->unit->name,
                        'modes' => collect($item->user?->modes)->pluck('name')->join('/'),
                    ]
                    : null,
                'created_at' => $item->created_at->toDateTimeString(),
            ];
        }

        return $data;
    }
}
