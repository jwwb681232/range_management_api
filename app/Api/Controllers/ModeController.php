<?php

namespace App\Api\Controllers;

use App\Api\Services\ModeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModeController extends Controller
{
    public ModeService $service;

    public function __construct()
    {
        $this->service = new ModeService();
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/mode",
     *     tags={"Common"},
     *     summary="模型角色列表",
     *     operationId="mode",
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        return apiReturn($this->service->index());
    }
}
