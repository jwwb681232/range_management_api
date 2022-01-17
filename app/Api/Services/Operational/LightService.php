<?php

namespace App\Api\Services\Operational;

use App\Models\Light;
use App\Models\LightDeck;
use App\Models\LightFolder;
use Illuminate\Http\Request;

class LightService
{
    public Light $model;

    public function __construct()
    {
        $this->model = new Light();
    }

    public function sync(Request $request)
    {
        foreach ($request->folders as $folder) {
            $lightFolder = LightFolder::query()->create(['name' => $folder['name']]);
            foreach ($folder['folders'] as $deck) {
                $lightDeck = LightDeck::query()->create(['folder_id'=>$lightFolder->id, 'name'=>$deck['name']]);
                $lights = [];
                foreach ($deck['areas'] as $light) {
                    $lights[] = [
                        'number'     => $light['number'],
                        'name'       => $light['name'],
                        'deck_id'    => $lightDeck->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                Light::query()->insert($lights);
            }
        }


        return $request->all();
    }

}
