<?php

namespace App\Modules\School\Repositories;

use App\Models\School;
use Illuminate\Support\Collection;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\School\Contracts\SchoolRepositoryInterface;


class SchoolRepository extends BaseRepository implements SchoolRepositoryInterface
{
    public function __construct(School $model)
    {
        parent::__construct($model);
    }

    public function getSchools(): ?Collection
    {
        return $this->model()->latest()->with('hostels')->get();
    }
}
