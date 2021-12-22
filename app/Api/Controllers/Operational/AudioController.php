<?php

namespace App\Api\Controllers\Operational;

use App\Api\Services\Operational\AudioService;
use App\Http\Controllers\Controller;
use App\Api\Requests\Admin\Unit\IndexRequest;

class AudioController extends Controller
{
    public AudioService $service;

    public function __construct()
    {
        $this->service = new AudioService();
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/operational/audio",
     *     tags={"Operational/Audio"},
     *     summary="音频列表",
     *     operationId="audio",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="query",name="page",description="当前页",schema={"type":"integer"},required=false),
     *     @OA\Parameter(in="query",name="limit",description="每页条数",schema={"type":"integer"},required=false),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function index(IndexRequest $request)
    {
        return apiReturn($this->service->index($request));
    }
}
