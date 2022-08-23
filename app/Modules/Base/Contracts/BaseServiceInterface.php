<?php

namespace App\Modules\Base\Contracts;

interface BaseServiceInterface
{
    public function checkPassword($password, $user): ?bool;

    public function hashPassword($password): string;

    public function logout($request): bool;
}
