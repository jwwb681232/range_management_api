<?php

namespace App\Api\Controllers\Operational;

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
     *     operationId="audio",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        return apiReturn($this->service->index());
    }
}
