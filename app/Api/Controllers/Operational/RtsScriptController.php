<?php

namespace App\Api\Controllers\Operational;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Services\Operational\RtsScriptService;

class RtsScriptController extends Controller
{
    public RtsScriptService $service;

    public function __construct()
    {
        $this->service = new RtsScriptService();
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/operational/rts-script",
     *     tags={"Operational/RTS_Script"},
     *     deprecated=false,
     *     summary="RTS Script列表",
     *     operationId="audio",
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
     *     path="/index.php/api/operational/rts-script/sync/{machine_number}",
     *     tags={"Operational/RTS_Script"},
     *     deprecated=false,
     *     summary="RTS Script同步",
     *     operationId="sync_rts_script",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="machine_number",description="机器编号",schema={"type":"string"},required=true),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              @OA\Property(property="RangeName", type="string", example="PCG-25m INDOOR",description="列表的 Ranges->RangeName"),
     *              @OA\Property(property="Name", type="string", example="Test.prg",description="列表的 Ranges->Scenarios->Name"),
     *              @OA\Property(property="CommandId", type="integer", example=1003),
     *              @OA\Property(property="Range", type="string", example="TestRange"),
     *              @OA\Property(property="ScenarioID", type="string", example="1"),
     *              @OA\Property(property="ScenarioName", type="string", example="Test"),
     *              @OA\Property(property="Steps", type="integer", example={0:{"Index":1,"Position":1,"Name":"Step 1"},1:{"Index":2,"Position":2,"Name":"Step 2"},2:{"Index":3,"Position":3,"Name":"Step 3"}}),
     *              @OA\Property(property="Participants", type="integer", example={0:{ "ParticipantIndex": 2500, "Name": "Lane 1" }, 1:{ "ParticipantIndex": 2501, "Name": "Lane 2" }, 2:{ "ParticipantIndex": 2502, "Name": "Lane 3" }, 3:{ "ParticipantIndex": 2503, "Name": "Lane 4" }, 4:{ "ParticipantIndex": 2504, "Name": "Lane 5" }, 5:{ "ParticipantIndex": 2505, "Name": "Lane 6" }, 6:{ "ParticipantIndex": 2506, "Name": "Lane 7" }, 7:{ "ParticipantIndex": 2507, "Name": "Lane 8" }}),
     *          )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function sync(Request $request)
    {
        return apiReturn($this->service->sync($request));
    }
}
