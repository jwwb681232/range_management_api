<?php

namespace App\Api\Requests\Operational\Scenario;

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
            'name'              => 'required|string',
            'description'       => 'required|string',
            'rts_script_detail' => 'required|string',
            'audio_detail'      => 'required|string',
            'light_detail'      => 'required|string',
            'type'              => 'required|in:1,2',
            'rts_script_id'     => 'required|exists:rts_scripts,id',
            'audio'             => 'required|array',
            'audio.*.id'        => 'required|exists:audios,id',
            'audio.*.start_at'  => 'required|integer|min:0',
            'audio.*.duration'  => 'required|integer|min:0',

            'light.*.id'       => 'required|exists:lights,id',
            'light.*.preset'   => 'required|integer',
            'light.*.start_at' => 'required|integer|min:0',
            'light.*.duration' => 'required|integer|min:0',
        ];
    }
}
