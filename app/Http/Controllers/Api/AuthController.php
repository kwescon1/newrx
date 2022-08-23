<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Exceptions\ValidationException;
use App\Http\Requests\RegisterationRequest;
use App\Modules\Auth\Contracts\AuthServiceInterface;

class AuthController extends Controller
{
    //
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterationRequest $request)
    {
        $data = $request->validated();

        try {
            return response()->created(new AuthResource($this->authService->register($data)));
        } catch (ValidationException $e) {
            return response()->error($e->getMessage(), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        try {
            return response()->success(new AuthResource($this->authService->login($data)));
        } catch (ValidationException $e) {
            return response()->error($e->getMessage(), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            return response()->success($this->authService->logout($request));
        } catch (ValidationException $e) {
            return response()->error($e->getMessage(), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return response()->error($e->getMessage());
        }
    }
}
