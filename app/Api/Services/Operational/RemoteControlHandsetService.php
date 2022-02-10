<?php

namespace App\Api\Services\Operational;

use App\Models\Scenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RemoteControlHandsetService
{
    public Scenario $model;

    public $cacheKey;

    public function __construct()
    {
        $this->model = new Scenario();
    }

    /**
     * @param  Request  $request
     *
     * @return bool
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function lock(Request $request)
    {
        $cacheKey = 'range_management:remote_control_handset:'.$request->machine_number;

        return Cache::set($cacheKey, $request->user()->id, 60 * 10);
    }

    /**
     * @param  Request  $request
     *
     * @return bool
     * @throws ValidationException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function unlock(Request $request)
    {
        // 密码不正确
        if ( ! Hash::check($request->password, $request->user()->password)) {
            throw ValidationException::withMessages(['name' => ['The provided credentials are incorrect']]);
        }

        $cacheKey = 'range_management:remote_control_handset:'.$request->machine_number;

        return Cache::delete($cacheKey);
    }
}
