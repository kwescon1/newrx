<?php

namespace App\Modules\School\Contracts;

use Illuminate\Support\Collection;


interface SchoolRepositoryInterface
{

    public function getSchools(): ?Collection;
}
