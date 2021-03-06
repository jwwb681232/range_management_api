<?php

namespace App\Api\Controllers\Admin;

use App\Api\Requests\Admin\User\ChangePasswordRequest;
use App\Api\Requests\Admin\User\DestroyRequest;
use App\Api\Requests\Admin\User\IndexRequest;
use App\Api\Requests\Admin\User\ShowRequest;
use App\Api\Requests\Admin\User\StoreRequest;
use App\Api\Requests\Admin\User\UpdateRequest;
use App\Api\Services\Admin\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/admin/user/{id}",
     *     tags={"Admin/User"},
     *     summary="用户详情",
     *     operationId="user_detail",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="path",name="id",description="用户id",schema={"type":"integer"},required=true),
     *     @OA\Response(response=200, description="success",@OA\JsonContent()),
     * )
     */
    public function show(Request $request)
    {
        return apiReturn($this->service->show($request));
    }

    /**
     * @OA\Get(
     *     path="/index.php/api/admin/user",
     *     tags={"Admin/User"},
     *     summary="用户列表",
     *     operationId="user",
     *     security={ { "bearerAuth":{}}},
     *     @OA\Parameter(in="query",name="keyword",description="搜索关键字",schema={"type":"string"},required=false),
     *     @OA\Parameter(in="query",name="mode_id",description="模型角色id",schema={"type":"integer"},required=false),
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
     *     path="/index.php/api/admin/user",
     *     tags={"Admin/User"},
     *     summary="添加用户",
     *     operationId="create_user",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"name","nric","unit_id","mode_id","password","password_confirmation","status"},
     *             @OA\Property( property="name",description="用户名称", type="string"),
     *             @OA\Property( property="nric",description="用户名称", type="string"),
     *             @OA\Property( property="unit_id",description="单位ID", type="integer"),
     *             @OA\Property( property="mode_id",description="模型角色Id(多个以,分隔)", type="array", @OA\Items(type="string")),
     *             @OA\Property( property="password",description="密码", type="string"),
     *             @OA\Property( property="password_confirmation",description="确认密码", type="string"),
     *             @OA\Property( property="status",description="状态（1：可以，0：禁用）", type="integer",enum={1,0}),
     *             @OA\Property( property="only_arr",description="ARR账号", type="integer",enum={1,0}),
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
     *     path="/index.php/api/admin/user",
     *     tags={"Admin/User"},
     *     summary="编辑用户",
     *     operationId="update_user",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"id","name","nric","unit_id","mode_id","status"},
     *             @OA\Property( property="id",description="用户id", type="integer"),
     *             @OA\Property( property="name",description="用户名称", type="string"),
     *             @OA\Property( property="nric",description="用户名称", type="string"),
     *             @OA\Property( property="unit_id",description="单位ID", type="integer"),
     *             @OA\Property( property="mode_id",description="模型角色Id(多个以,分隔)", type="array", @OA\Items(type="string")),
     *             @OA\Property( property="status",description="状态（1：可以，0：禁用）", type="integer",enum={1,0}),
     *             @OA\Property( property="only_arr",description="ARR账号", type="integer",enum={1,0}),
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
     *     path="/index.php/api/admin/user",
     *     tags={"Admin/User"},
     *     summary="删除用户",
     *     operationId="delete_user",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"id"},
     *             @OA\Property( property="id",description="user id", type="integer"),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function destroy(DestroyRequest $request)
    {
        return apiReturn($this->service->destroy($request->id));
    }

    /**
     * @OA\Put(
     *     path="/index.php/api/admin/user/password",
     *     tags={"Admin/User"},
     *     summary="修改密码",
     *     operationId="user_password",
     *     security={ { "bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"id","old_password","password","password_confirmation"},
     *             @OA\Property( property="id",description="用户id", type="integer"),
     *             @OA\Property( property="old_password",description="旧密码", type="string"),
     *             @OA\Property( property="password",description="新密码", type="string"),
     *             @OA\Property( property="password_confirmation",description="确认新密码", type="string"),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful",@OA\JsonContent())
     * )
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        return apiReturn($this->service->changePassword($request));
    }
}
