<?php

namespace App\Providers;

use App\Http\Repositories\ProdutosRepository;
use App\Http\Repositories\ProdutosRepositoryInterface;
use App\Http\Services\ProdutosService;
use App\Http\Services\ProdutosServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProdutosServiceInterface::class, ProdutosService::class);
        $this->app->bind(ProdutosRepositoryInterface::class, ProdutosRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
