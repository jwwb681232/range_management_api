<?php

namespace App\Api\Controllers;

use App\Api\Services\ModeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
