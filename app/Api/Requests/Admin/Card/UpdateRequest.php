<?php

namespace App\Api\Requests\Admin\Card;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id'     => 'required|string|exists:cards,id',
            'number'   => 'required|string|max:64|unique:cards,number,'.request('id'),
        ];
    }
}
