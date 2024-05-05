<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Customer\{
    CustomerRepository,
    CustomerRepositoryInterface
};

/**
 * Class RepositoryServiceProvider
 * Serviceprovider to bind the interfaces with their corresponding repository classes
 *
 * @package App\Repositories
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application interfaces.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CustomerRepositoryInterface::class,
            CustomerRepository::class
        );
    }
}
