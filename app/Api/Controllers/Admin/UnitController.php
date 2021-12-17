<?php

namespace App\Api\Controllers\Admin;

use App\Api\Services\Admin\UnitService;
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
     *     path="/index.php/api/admin/unit",
     *     tags={"Admin"},
     *     summary="单位列表",
     *     operationId="unit",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="query",name="keyword",description="搜索关键字",schema={"type":"string"},required=false),
     *     @OA\Parameter(in="query",name="status",description="状态",schema={"type":"integer"},required=false),
     *     @OA\Parameter(in="query",name="page",description="当前页",schema={"type":"integer"},required=false),
     *     @OA\Parameter(in="query",name="limit",description="每页条数",schema={"type":"integer"},required=false),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        return apiReturn($this->service->index($request));
    }
}
