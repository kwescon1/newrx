<?php

namespace App\Modules\Auth\Contracts;

interface AuthServiceInterface
{
    public function register($data): ?array;
    public function login($data): ?array;
}
