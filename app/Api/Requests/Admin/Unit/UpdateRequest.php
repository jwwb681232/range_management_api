<?php

namespace App\Api\Requests\Admin\Unit;

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
            'id'     => 'required|string|exists:units,id',
            'name'   => 'required|string|max:64|unique:units,name,'.request('id'),
            'status' => 'required|in:0,1',
        ];
    }
}
