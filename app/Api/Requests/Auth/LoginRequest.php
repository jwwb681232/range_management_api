<?php

namespace App\Api\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mode'     => 'required|integer|exists:modes,id',
            'name'     => 'required|string|exists:users,name',
            'unit_id'  => 'required|integer|exists:units,id',
            'password' => 'required|string',
        ];
    }
}
