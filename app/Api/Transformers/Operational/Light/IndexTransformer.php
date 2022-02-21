<?php

namespace App\Api\Transformers\Operational\Light;

use Illuminate\Support\Collection;

class IndexTransformer
{
    public function transform(Collection $collection)
    {
        $data       = [];
        $collection = $collection->groupBy('deck');
        foreach ($collection as $key => $areas) {
            $data[] = [
                'areas'       => $this->areas($areas),
                'category'    => '',
                'description' => $areas->first()->description,
                'folders'     => '',
                'name'        => $key,
            ];
        }

        return $data;
    }

    private function areas($areas)
    {
        $data = [];
        foreach ($areas as $area) {
            $data[] = [
                'category'    => '',
                'description' => '',
                'location'    => '',
                'name'        => $area->name,
                'number'      => $area->number,
                'template'    => '',
            ];
        }

        return $data;
    }
}
