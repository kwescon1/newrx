<?php

namespace App\Modules\Students\Contracts;

interface StudentRepositoryInterface
{
    public function findStudent($fieldType, $value): ?object;
}
