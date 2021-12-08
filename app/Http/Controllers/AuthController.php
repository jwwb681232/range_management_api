<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $admin = Administrator::where('email', $request->email)->first();

        if ( ! $admin || ! Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages(['email' => ['The provided credentials are incorrect.'],]);
        }

        $admin->tokens()->delete();
        $data = $admin->createToken($admin->name)->plainTextToken;

        return apiReturn(['token' => $data]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return apiReturn([]);
    }
}
