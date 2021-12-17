<?php


namespace App\Api\Controllers;


use App\Http\Controllers\Controller;

class SwaggerController extends Controller
{

    /**
     * @OA\Info(title="Range Management Api", version="")
     */
    /**
     * @OA\SecurityScheme( securityScheme="bearerAuth", in="header", name="Authorization", type="apiKey", scheme="Bearer", bearerFormat="JWT")
     */
    public function toJson()
    {
        $openapi = \OpenApi\scan(app_path("Api/Controllers/"));
        return response()->json($openapi);
    }
}
