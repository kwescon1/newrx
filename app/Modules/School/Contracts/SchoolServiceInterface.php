<?php

namespace App\Modules\School\Contracts;

use Illuminate\Support\Collection;

interface SchoolServiceInterface
{
    public function index(): ?Collection;
}
