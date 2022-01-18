<?php

namespace App\Api\Controllers\Operational;

use App\Api\Requests\Operational\Scenario\StoreRequest;
use App\Api\Requests\Operational\Scenario\UpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Services\Operational\ScenarioService;

class ScenarioController extends Controller
{
    public ScenarioService $service;

    public function __construct()
    {
        $this->service = new ScenarioService();
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/operational/scenario",
     *     tags={"Operational/Scenario"},
     *     deprecated=false,
     *     summary="场景列表",
     *     operationId="scenario_list",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="query",name="type",description="培训类型[1：Group,2：Individual]",schema={"type":"integer"},required=false),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        return apiReturn($this->service->index($request->type));
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/operational/scenario",
     *     tags={"Operational/Scenario"},
     *     deprecated=false,
     *     summary="创建场景",
     *     operationId="create_scenario",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(required={"name","description","type","rts_script_id","audio"},
     *             @OA\Property( property="name",type="string",description="场景名称",example="name of scenario"),
     *             @OA\Property( property="description",type="string",description="场景描述",example="description of scenario"),
     *             @OA\Property( property="rts_script_detail",type="string",description="rts script格式化详细描述",example=""),
     *             @OA\Property( property="audio_detail",type="string",description="audio格式化详细描述",example=""),
     *             @OA\Property( property="light_detail",type="string",description="light格式化详细描述",example=""),
     *             @OA\Property( property="type",type="integer",description="场景培训类型[1：Group,2：Individual]",example=1),
     *             @OA\Property( property="rts_script_id",description="rts脚本id",type="integer",example=1),
     *             @OA\Property( property="audio",description="音频持续多少秒", type="integer",example={0:{"id":1,"start_at":0,"duration":30}}),
     *             @OA\Property( property="light",description="灯光持续多少秒", type="integer",example={0:{"id":1,"preset":2,"start_at":0,"duration":30}}),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function store(StoreRequest $request)
    {
        return apiReturn($this->service->store($request));
    }

    /**
     * @OA\Put (
     *     path="/index.php/api/operational/scenario/{id}",
     *     tags={"Operational/Scenario"},
     *     deprecated=false,
     *     summary="编辑场景",
     *     operationId="update_scenario",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="id",description="自己系统的场景ID",schema={"type":"integer"},required=true),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(required={"name","description","type","rts_script_id","audio"},
     *             @OA\Property( property="name",type="string",description="场景名称",example="name of scenario"),
     *             @OA\Property( property="description",type="string",description="场景描述",example="description of scenario"),
     *             @OA\Property( property="rts_script_detail",type="string",description="rts script格式化详细描述",example=""),
     *             @OA\Property( property="audio_detail",type="string",description="audio格式化详细描述",example=""),
     *             @OA\Property( property="light_detail",type="string",description="light格式化详细描述",example=""),
     *             @OA\Property( property="type",type="integer",description="场景培训类型[1：Group,2：Individual]",example=1),
     *             @OA\Property( property="rts_script_id",description="rts脚本id",type="integer",example=1),
     *             @OA\Property( property="audio",description="音频持续多少秒", type="integer",example={0:{"id":1,"start_at":0,"duration":30}}),
     *             @OA\Property( property="light",description="灯光持续多少秒", type="integer",example={0:{"id":1,"preset":2,"start_at":0,"duration":30}}),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function update(UpdateRequest $request)
    {
        return apiReturn($this->service->update($request));
    }

    /**
     * @OA\Delete(
     *     path="/index.php/api/operational/scenario/{id}",
     *     tags={"Operational/Scenario"},
     *     deprecated=false,
     *     summary="删除场景",
     *     operationId="delete_scenario",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="id",description="自己系统的场景ID",schema={"type":"integer"},required=true),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function destroy(Request $request)
    {
        return apiReturn($this->service->destroy($request->id));
    }
}
