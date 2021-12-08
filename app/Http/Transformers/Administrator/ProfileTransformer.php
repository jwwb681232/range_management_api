<?php

namespace App\Http\Transformers\Administrator;

use App\Models\Administrator;

class ProfileTransformer
{
    public function transform(Administrator $administrator): array
    {
        $data['profile'] = [
            'id'     => $administrator->id,
            'name'   => $administrator->name,
            'avatar' => 'https://gw.alipayobjects.com/zos/rmsportal/KDpgvguMpGfqaHPjicRK.svg',
        ];

        $data['menus'] = [

        ];

        return $data;
    }
}
