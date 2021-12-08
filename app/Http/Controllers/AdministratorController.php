<?php

namespace App\Http\Controllers;


use App\Http\Services\AdministratorService;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new AdministratorService();
    }

    public function profile(Request $request)
    {
        $data = $this->service->profile($request->user()->id);
        return apiReturn($data);
    }
}
