<?php

namespace App\Api\Transformers\Operational\Audio;

use Illuminate\Support\Collection;

class IndexTransformer
{
    public static function transform(Collection $collection)
    {
        $data = [];

        foreach ($collection as $item) {
            $data[] = [
                'id'          => $item->id,
                'title'       => $item->title,
                'description' => $item->description,
                'path'        => $item->path,
                'duration'    => $item->duration,
                'type'        => $item->type,
            ];
        }

        return $data;
    }
}
