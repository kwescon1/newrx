<?php

namespace App\Modules\School\Services;

use Illuminate\Support\Collection;
use App\Modules\Base\Services\BaseService;
use App\Modules\School\Contracts\SchoolServiceInterface;
use App\Modules\School\Contracts\SchoolRepositoryInterface;

class SchoolService extends BaseService implements SchoolServiceInterface
{

    private $schoolRepository;

    public function __construct(SchoolRepositoryInterface $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function index(): ?Collection
    {
        return $this->schoolRepository->getSchools();
    }
}
