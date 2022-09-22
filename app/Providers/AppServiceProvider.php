<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;

use Illuminate\Support\{
    ServiceProvider,
    Facades\Response
};

use App\Modules\Auth\Contracts\AuthServiceInterface;
use App\Modules\School\Contracts\SchoolServiceInterface;
use App\Modules\Auth\Services\AuthService;
use App\Modules\School\Services\SchoolService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(SchoolServiceInterface::class, SchoolService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        JsonResource::withoutwrapping();

        Response::macro('success', function ($data) {
            return response()->json([
                'data' => $data ?: null,
            ]);
        });

        Response::macro('created', function ($data) {
            return response()->json([
                'data' => $data ?: null,
            ], \Illuminate\Http\Response::HTTP_CREATED);
        });

        Response::macro('notfound', function ($error) {
            return response()->json([
                'error' => $error,
            ], \Illuminate\Http\Response::HTTP_NOT_FOUND);
        });

        Response::macro('error', function ($error, $statusCode = \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR) {
            return response()->json([
                'error' => $error,
            ], $statusCode);
        });
    }
}
