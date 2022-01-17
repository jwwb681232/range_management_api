<?php

namespace App\Api\Controllers\Operational;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Services\Operational\LightService;

class LightController extends Controller
{
    public LightService $service;

    public function __construct()
    {
        $this->service = new LightService();
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/operational/light/sync",
     *     tags={"Operational/Light"},
     *     deprecated=false,
     *     summary="Light同步",
     *     operationId="sync_light",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema()
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function sync(Request $request)
    {
        return apiReturn($this->service->sync($request));
    }
}
