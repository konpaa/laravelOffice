<?php

namespace App\Providers;

use App\Repositories\DepartmentsRepository;
use App\Repositories\Interfaces\DepartmentsRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Repositories\StaffRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            StaffRepositoryInterface::class,
            StaffRepository::class
        );
        $this->app->bind(
            DepartmentsRepositoryInterface::class,
            DepartmentsRepository::class
        );
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
