<?php

namespace App\Modules\Auth\Services;

use Illuminate\Support\Facades\Hash;
use App\Exceptions\ValidationException;
use App\Modules\Base\Services\BaseService;
use App\Modules\Auth\Contracts\AuthServiceInterface;
use App\Modules\Students\Contracts\StudentRepositoryInterface;

class AuthService extends BaseService implements AuthServiceInterface
{
    /**
     * Login username to be used by the service.
     *
     * @var string
     */
    private $fieldType;
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /** @return array @param data*/
    public function register($data): ?array
    {
        $data['password'] = $this->hashPassword($data['password']);

        $student = $this->studentRepository->create($data);

        //create student token
        $token = $student->createToken('contra')->plainTextToken;

        return [
            'student' => $student,
            'token' => $token
        ];
    }



    public function login($data): ?array
    {

        $fieldType = $this->fieldType($data['login']);

        //get student
        $student = $this->studentRepository->findStudent($fieldType, $data['login']);

        //check password
        if (!$student || !$this->checkPassword($data['password'], $student)) {
            throw new ValidationException("Invalid $fieldType or password");
        }

        //create token
        $token = $student->createToken('contra')->plainTextToken;

        return [
            'student' => $student,
            'token' => $token
        ];
    }


    /**
     * Get the login username to be used by the service class.
     *
     * @return string
     */
    private function fieldType($data): ?string
    {

        $fieldType = filter_var($data, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return $fieldType;
    }
}
