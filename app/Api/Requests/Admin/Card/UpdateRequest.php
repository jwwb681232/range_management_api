<?php

namespace App\Api\Requests\Admin\Card;

use App\Models\User;
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
            'id'      => 'required|exists:cards,id',
            'number'  => 'required|string|max:64|unique:cards,number,'.request('id'),
            'user_id' => 'required|exists:users,id',
        ];
    }

    /**
     * @param $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            //被分配的用户已经有卡了
            $user = User::find(request('user_id'));
            if ($user->card_id != request('id') && $user->card_id != 0){
                $validator->errors()->add('user_id', 'This user already has a card');
            }
        });
    }
}
