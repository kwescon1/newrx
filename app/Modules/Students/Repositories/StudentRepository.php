<?php

namespace App\Modules\Students\Repositories;

use App\Models\Student;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Students\Contracts\StudentRepositoryInterface;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{

    public function __construct(Student $model)
    {
        parent::__construct($model);
    }

    public function findStudent($fieldType, $value): ?object
    {
        return $this->model()->where($fieldType, $value)->first();
    }
}
