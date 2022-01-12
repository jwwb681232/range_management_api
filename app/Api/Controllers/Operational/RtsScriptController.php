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
}
