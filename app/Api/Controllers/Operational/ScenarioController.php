<?php

namespace App\Api\Controllers\Operational;

use App\Api\Requests\Operational\Scenario\StoreRequest;
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
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        return apiReturn($this->service->index());
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/operational/scenario",
     *     tags={"Operational/Scenario"},
     *     deprecated=false,
     *     summary="创建场景(灯光目前缺失)",
     *     operationId="create_scenario",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(required={"name","description","type","rts_script_id","audio"},
     *             @OA\Property( property="name",type="string",description="场景名称",example="name of scenario"),
     *             @OA\Property( property="description",type="string",description="场景描述",example="description of scenario"),
     *             @OA\Property( property="type",type="integer",description="场景培训类型[1：Group,2：Individual]",example=1),
     *             @OA\Property( property="rts_script_id",description="rts脚本id",type="integer",example=1),
     *             @OA\Property( property="audio",description="持续播放多少秒", type="integer",example={"id":1,"start_at":0,"duration":30}),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function store(StoreRequest $request)
    {
        return apiReturn($this->service->store($request));
    }
}
