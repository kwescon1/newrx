<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\School\Repositories\SchoolRepository;
use App\Modules\Students\Repositories\StudentRepository;
use App\Modules\School\Contracts\SchoolRepositoryInterface;
use App\Modules\Students\Contracts\StudentRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
