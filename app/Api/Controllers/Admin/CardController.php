<?php

namespace App\Api\Controllers\Admin;

use App\Api\Requests\Admin\Card\DestroyRequest;
use App\Api\Requests\Admin\Card\IndexRequest;
use App\Api\Requests\Admin\Card\StoreRequest;
use App\Api\Requests\Admin\Card\UpdateRequest;
use App\Api\Services\Admin\CardService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public CardService $service;

    public function __construct()
    {
        $this->service = new CardService();
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/admin/card/{id}",
     *     tags={"Admin/Card"},
     *     summary="卡片详情",
     *     operationId="card_detail",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="id",description="卡片id",schema={"type":"integer"},required=true),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function show(Request $request)
    {
        return apiReturn($this->service->show($request));
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/admin/card",
     *     tags={"Admin/Card"},
     *     summary="卡片列表",
     *     operationId="card",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="query",name="keyword",description="搜索关键字",schema={"type":"string"},required=false),
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
     *     path="/index.php/api/admin/card",
     *     tags={"Admin/Card"},
     *     summary="添加卡片",
     *     operationId="create_card",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"name","status"},
     *             @OA\Property( property="number",description="卡片编号", type="string"),
     *             @OA\Property( property="user_id",description="所属用户id", type="integer"),
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
     *     path="/index.php/api/admin/card",
     *     tags={"Admin/Card"},
     *     summary="编辑卡片",
     *     operationId="update_card",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"id","number","user_id"},
     *             @OA\Property( property="id",description="card id", type="integer"),
     *             @OA\Property( property="number",description="卡片编号", type="string"),
     *             @OA\Property( property="user_id",description="所属用户id", type="integer"),
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
     *     path="/index.php/api/admin/card",
     *     tags={"Admin/Card"},
     *     summary="删除卡片",
     *     operationId="delete_card",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"id"},
     *             @OA\Property( property="id",description="card id", type="integer"),
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
