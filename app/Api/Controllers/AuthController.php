<?php

namespace App\Api\Controllers;

use App\Api\Requests\Auth\LoginRequest;
use App\Api\Requests\Auth\LoginWithCardRequest;
use Illuminate\Http\Request;
use App\Api\Services\AuthService;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new AuthService();
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/auth/login",
     *     tags={"Auth"},
     *     summary="登陆 第一步：验证用户信息",
     *     operationId="auth-login",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"mode","name","unit_id","password"},
     *             @OA\Property( property="mode",description="角色模式[`1:Operational`,`2:Maintenance`,`3:Admin`]", type="integer"),
     *             @OA\Property( property="name",description="名字", type="string"),
     *             @OA\Property( property="unit_id",description="单位id", type="integer"),
     *             @OA\Property( property="password",description="密码", type="string"),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful"),
     * )
     */
    public function login(LoginRequest $request)
    {
        $data = $this->service->login($request);
        return apiReturn($data);
    }

    /**
     * @OA\Post(
     *     path="/index.php/api/auth/login/card",
     *     tags={"Auth"},
     *     summary="登陆 第二步：验证用户与卡信息",
     *     operationId="auth-login-with-card",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *          mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(required={"id","card_number"},
     *             @OA\Property( property="id",description="用户ID", type="integer"),
     *             @OA\Property( property="card_number",description="卡的编码", type="string"),
     *         )
     *     )),
     *     @OA\Response(response=200, description="Successful")
     * )
     */
    public function loginWithCard(LoginWithCardRequest $request)
    {
        $data = $this->service->loginWithCard($request);
        return apiReturn($data);
    }
}
