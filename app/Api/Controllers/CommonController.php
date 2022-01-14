<?php

namespace App\Api\Controllers;

use App\Api\Services\ModeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CommonController extends Controller
{
    public ModeService $service;

    public function __construct()
    {
        $this->service = new ModeService();
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/common/time",
     *     tags={"Common"},
     *     summary="服务器时间",
     *     operationId="mode",
     *     @OA\Parameter(in="query",name="real",description="实时时间[0:否,1:是]",schema={"type":"bool"}),
     *     @OA\Response(response=200,description="success",@OA\JsonContent()),
     * )
     */
    public function time(Request $request)
    {
        $time = $request->real ? now()->format("Y-m-d H:i:s") : now()->format("Y-m-d H:i:").'00';
        return apiReturn($time);
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/common/setting/auto-sync",
     *     tags={"Common"},
     *     deprecated=false,
     *     summary="设置自动同步配置",
     *     operationId="set_setting_auto_sync",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(required={"name","description","type","rts_script_id","audio"},
     *             @OA\Property( property="time",type="string",description="时间",example="09:00"),
     *             @OA\Property( property="status",type="integer",description="是否开启",example=1),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function setAutoSync(Request $request)
    {
        return apiReturn(Cache::forever('api:auto_sync',$request->all()));
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/common/setting/auto-sync",
     *     tags={"Common"},
     *     summary="获取自动同步配置",
     *     operationId="get_setting_auto_sync",
     *     @OA\Response(response=200,description="success",@OA\JsonContent()),
     * )
     */
    public function autoSync(Request $request)
    {
        return apiReturn(Cache::get('api:auto_sync'));
    }
}
