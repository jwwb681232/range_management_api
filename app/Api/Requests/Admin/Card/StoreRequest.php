<?php

namespace App\Api\Requests\Admin\Card;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'number'  => 'required|string|max:64|unique:cards,number',
            'user_id' => 'required|integer|max:64|exists:users,id',
        ];
    }
}
