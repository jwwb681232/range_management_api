<?php

namespace App\Api\Requests\Admin\User;

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
            'name'     => 'required|string|max:64|unique:users,name',
            'nric'     => 'required|string|max:64|unique:users,nric',
            'unit_id'  => 'required|integer|max:64|exists:units,id',
            'mode_id'  => 'required|string',
            'password' => 'required|string|confirmed|min:6|max:32',
            'status'   => 'required|in:0,1',
        ];
    }

    /**
     * @param $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $this->request->set('mode_ids',explode(',',$this->request->get('mode_id')));
        });
    }
}
