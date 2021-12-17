<?php

namespace App\Api\Controllers;

use App\Api\Services\UnitService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public UnitService $service;

    public function __construct()
    {
        $this->service = new UnitService();
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/unit",
     *     tags={"Common"},
     *     summary="单位列表",
     *     operationId="unit",
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        return apiReturn($this->service->index());
    }
}
