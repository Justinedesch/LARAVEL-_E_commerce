<?php

namespace App\Providers;

use App\Interfaces\AddressRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CommandRepositoryInterface;
use App\Interfaces\GameplayRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\AddressRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CommandRepository;
use App\Repositories\GameplayRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(GameplayRepositoryInterface::class, GameplayRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(CommandRepositoryInterface::class, CommandRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
