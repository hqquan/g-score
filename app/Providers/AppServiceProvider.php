<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Repositories\Student\StudentRepository;
use App\Services\Student\StudentServiceInterface;
use App\Services\Student\StudentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(StudentServiceInterface::class, StudentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
