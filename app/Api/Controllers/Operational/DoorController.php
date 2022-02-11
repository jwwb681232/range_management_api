<?php

namespace App\Api\Controllers\Operational;

use App\Api\Services\Operational\DoorService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoorController extends Controller
{
    public DoorService $service;

    public function __construct()
    {
        $this->service = new DoorService();
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/operational/door/sync",
     *     tags={"Operational/Door"},
     *     deprecated=false,
     *     summary="Door同步(传数组)",
     *     operationId="sync_door",
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

    /**
     * @OA\Get(
     *     path="/index.php/api/operational/door/config/{machine_number}",
     *     tags={"Operational/Door"},
     *     deprecated=false,
     *     summary="Door Access 检查",
     *     operationId="rms_door",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="machine_number",description="机器编号",schema={"type":"string"},required=true),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function machineNumber(Request $request)
    {
        $doors = config('door.'.$request->machine_number);
        return apiReturn($doors);
    }
}
