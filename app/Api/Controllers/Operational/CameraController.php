<?php

namespace App\Api\Controllers\Operational;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Services\Operational\CameraService;

class CameraController extends Controller
{
    public CameraService $service;

    public function __construct()
    {
        $this->service = new CameraService();
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/operational/camera/sync",
     *     tags={"Operational/Camera"},
     *     deprecated=false,
     *     summary="Camera同步(传devices数组)",
     *     operationId="sync_door",
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
