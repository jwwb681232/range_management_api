<?php

namespace App\Api\Requests\Auth;

use App\CacheKeys;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginWithCardRequest extends FormRequest
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
            'id'          => 'required|integer|exists:users,id',
            'card_number' => 'required|integer|exists:cards,number',
        ];
    }

    /**
     * @param $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            // 用户与卡号不匹配
            $user = User::with('card')->find($this->request->get('id'));
            if ($user->card->number != $this->request->get('card_number')) {
                $validator->errors()->add('card_number', 'This card does not belong to the user');
            }

            // 没有临时Token
            $tempToken = Cache::get(CacheKeys::tempToken($this->request->get('id')));
            if (!$tempToken){
                $validator->errors()->add('id', 'Verification timed out, please login again');
            }

            // 缓存里的临时Token与提交的信息不匹配
            if ( ! Hash::check(originTempToken($user), $tempToken)) {
                $validator->errors()->add('name', 'The provided credentials are incorrect');
            }


            $this->request->set('user',$user);
        });
    }
}
