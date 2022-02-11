<?php

namespace App\Api\Controllers\Operational;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Services\Operational\RemoteControlHandsetService;

class RemoteControlHandsetController extends Controller
{
    public RemoteControlHandsetService $service;

    public function __construct()
    {
        $this->service = new RemoteControlHandsetService();
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/operational/remote-control-handset/lock/{machine_number}",
     *     tags={"Operational/Firing"},
     *     deprecated=false,
     *     summary="获取是否正在进行远程模式",
     *     operationId="get_remote_control_handset_lock",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="machine_number",description="机器编号",schema={"type":"string"},required=true),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        return apiReturn($this->service->index($request));
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/operational/remote-control-handset/lock/{machine_number}",
     *     tags={"Operational/Firing"},
     *     deprecated=false,
     *     summary="设置正在进行远程模式(锁定)",
     *     operationId="post_remote_control_handset_lock",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="machine_number",description="机器编号",schema={"type":"string"},required=true),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function lock(Request $request)
    {
        return apiReturn($this->service->lock($request));
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/operational/remote-control-handset/unlock/{machine_number}",
     *     tags={"Operational/Firing"},
     *     deprecated=false,
     *     summary="设置正在进行远程模式(解除锁定)",
     *     operationId="post_remote_control_handset_unlock",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="machine_number",description="机器编号",schema={"type":"string"},required=true),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"password"},
     *             @OA\Property( property="password",description="密码", type="string"),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function unlock(Request $request)
    {
        return apiReturn($this->service->unlock($request));
    }

}
