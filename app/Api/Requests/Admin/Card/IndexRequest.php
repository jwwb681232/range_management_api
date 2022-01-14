<?php

namespace App\Api\Requests\Admin\Card;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'keyword' => 'string',
            'unit'    => 'integer|exists:units,id',
            'mode'    => 'integer|exists:modes,id',
            'status'  => 'in:0,1',
            'page'    => 'integer',
            'limit'   => 'integer',
        ];
    }
}
