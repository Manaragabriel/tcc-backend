<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Organization\IOrganizationRepository;
use App\Repositories\Organization\OrganizationRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IOrganizationRepository::class, OrganizationRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
