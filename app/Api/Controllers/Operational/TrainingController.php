<?php

namespace App\Api\Controllers\Operational;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Services\Operational\TrainingService;

class TrainingController extends Controller
{
    public TrainingService $service;

    public function __construct()
    {
        $this->service = new TrainingService();
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/operational/training",
     *     tags={"Operational/Training"},
     *     deprecated=false,
     *     summary="保存训练记录",
     *     operationId="post_training",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(required={"type","scenario_id","rts_script_id","start_at","end_at"},
     *             @OA\Property( property="type",type="integer",description="训练的模式[1：Group,2：Individual,3：Manual Training,4：Remote Control Handset mode(此模式应该不请求接口)]",example=1),
     *             @OA\Property( property="scenario_id",type="integer",description="训练时使用的场景id(只有type=[1,2]的时候才有值,其余传0)",example=2),
     *             @OA\Property( property="rts_script_id",type="integer",description="训练时使用rts script id(只有type=[3]的时候才有值,其余传0)",example=1),
     *             @OA\Property( property="start_at",type="string",description="训练开始时间",example="2022-02-11 14:20:50"),
     *             @OA\Property( property="end_at",type="string",description="训练结束时间",example="2022-02-11 14:22:32"),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function store(Request $request)
    {
        return apiReturn($this->service->store($request));
    }
}
