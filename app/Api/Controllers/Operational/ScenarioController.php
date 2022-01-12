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
     *     deprecated=true,
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
     *     deprecated=true,
     *     summary="创建场景(灯光目前缺失)",
     *     operationId="create_scenario",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"name","description","type","rts_script_id","audio[id]","audio[start_at]","audio[duration]"},
     *             @OA\Property( property="name",description="场景名称", type="string"),
     *             @OA\Property( property="description",description="场景描述", type="string"),
     *             @OA\Property( property="type",description="场景培训类型[1：Group,2：Individual]", type="integer"),
     *             @OA\Property( property="rts_script_id",description="rts脚本id", type="integer"),
     *             @OA\Property( property="audio[id]",description="音频id", type="integer"),
     *             @OA\Property( property="audio[start_at]",description="从哪一秒开始播放", type="integer"),
     *             @OA\Property( property="audio[duration]",description="持续播放多少秒", type="integer"),
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
