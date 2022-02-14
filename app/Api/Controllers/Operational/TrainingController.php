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
     * @OA\Get(
     *     path="/index.php/api/operational/training/detail/{id}",
     *     tags={"Operational/Training"},
     *     deprecated=false,
     *     summary="训练详情",
     *     operationId="get_training_detail",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="id",description="训练id",schema={"type":"integer"},required=true),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function show(Request $request)
    {
        return apiReturn($this->service->detail($request->id));
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/operational/training/pdf/{id}",
     *     tags={"Operational/Training"},
     *     deprecated=false,
     *     summary="训练详情PDF",
     *     operationId="get_training_pdf",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="id",description="训练id",schema={"type":"integer"},required=true),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function pdf(Request $request)
    {
        return apiReturn($this->service->pdf($request->id));
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/operational/training/latest",
     *     tags={"Operational/Training"},
     *     deprecated=false,
     *     summary="文件夹时间",
     *     operationId="get_training_latest_time",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function latestTime()
    {
        return apiReturn($this->service->latestTime());
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/operational/training/{mode}",
     *     tags={"Operational/Training"},
     *     deprecated=false,
     *     summary="训练记录 文件夹深度 1",
     *     operationId="get_training_mode",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="mode",description="训练模式[manual,scenario]",schema={"type":"string"},required=true),
     *     @OA\Parameter(in="query",name="date",description="搜索日期",schema={"type":"string"},required=false),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function mode(Request $request)
    {
        return apiReturn($this->service->mode($request));
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/operational/training/{mode}/{date}",
     *     tags={"Operational/Training"},
     *     deprecated=false,
     *     summary="训练记录 文件夹深度 2",
     *     operationId="get_training_date",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="mode",description="训练模式[manual,scenario]",schema={"type":"string"},required=true),
     *     @OA\Parameter(in="path",name="date",description="训练日期",schema={"type":"string"},required=true),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function date(Request $request)
    {
        return apiReturn($this->service->date($request));
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
     *             @OA\Property( property="firing_detail",type="string",description="",example="4"),
     *             @OA\Property( property="total_hits",type="integer",description="",example=0),
     *             @OA\Property( property="trainees",description="训练人员", type="integer",example={0:{"name":"wangxiao","rank":1,"ic":"S9208291E"},1:{"name":"muge","rank":2,"ic":"S2011291E"}}),
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
