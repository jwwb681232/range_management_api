<?php

namespace App\Api\Controllers\Admin;

use App\Api\Requests\Admin\Unit\DestroyRequest;
use App\Api\Requests\Admin\Unit\IndexRequest;
use App\Api\Requests\Admin\Unit\StoreRequest;
use App\Api\Requests\Admin\Unit\UpdateRequest;
use App\Api\Services\Admin\UnitService;
use App\Http\Controllers\Controller;

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
    public function index(IndexRequest $request)
    {
        return apiReturn($this->service->index($request));
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/admin/unit",
     *     tags={"Admin"},
     *     summary="添加单位",
     *     operationId="create_unit",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"name","status"},
     *             @OA\Property( property="name",description="unit 名称", type="string"),
     *             @OA\Property( property="status",description="状态（1：可以，0：禁用）", type="integer"),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function store(StoreRequest $request)
    {
        return apiReturn($this->service->store($request));
    }

    /**
     * @OA\Put(
     *     path="/index.php/api/admin/unit",
     *     tags={"Admin"},
     *     summary="编辑单位",
     *     operationId="update_unit",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"id","name","status"},
     *             @OA\Property( property="id",description="unit id", type="integer"),
     *             @OA\Property( property="name",description="unit 名称", type="string"),
     *             @OA\Property( property="status",description="状态（1：可以，0：禁用）", type="integer"),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function update(UpdateRequest $request)
    {
        return apiReturn($this->service->update($request));
    }

    /**
     * @OA\Delete(
     *     path="/index.php/api/admin/unit",
     *     tags={"Admin"},
     *     summary="删除单位",
     *     operationId="delete_unit",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"id"},
     *             @OA\Property( property="id",description="unit id", type="integer"),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function destroy(DestroyRequest $request)
    {
        return apiReturn($this->service->destroy($request->id));
    }
}
