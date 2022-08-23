<?php

namespace App\Modules\Base\Services;

use Illuminate\Support\Facades\Hash;
use App\Modules\Base\Contracts\BaseServiceInterface;


class BaseService implements BaseServiceInterface
{

    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_SUSPENDED = 2;

    /**
     * 
     * @param $password
     * @param $user
     * @return null|bool
     */
    public function checkPassword($password, $user): ?bool
    {
        return Hash::check($password, $user->password);
    }

    public function hashPassword($password): string
    {
        return  Hash::make($password);
    }

    public function logout($request): bool
    {

        return auth()->user()->tokens()->delete();
    }
}
