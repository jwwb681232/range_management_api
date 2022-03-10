<?php

namespace App\Api\Transformers\Admin\User;

use App\Api\Transformers\Auth\LoginTransformer;
use App\Models\User;
use Illuminate\Support\Collection;

class IndexTransformer
{
    public static function transform(Collection $collection)
    {
        $data = [];

        foreach ($collection as $item) {
            $onlyARR = (new LoginTransformer($item))->onlyARR();
            $data[] = [
                'id'         => $item->id,
                'name'       => $item->name,
                'nric'       => $item->nric,
                'unit'       => $item->unit->name,
                'modes'      => $onlyARR ? "Operational (Only ARR)" : $item->modes->pluck('name')->join(' / '),
                'status'     => User::$statusMap[$item->status],
                'only_arr'   => $onlyARR,
                'created_at' => $item->created_at->format("d M Y"),
            ];
        }

        return $data;
    }
}
