<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Organization\IOrganizationRepository;
use App\Repositories\Organization\OrganizationRepository;
use App\Repositories\Team\ITeamRepository;
use App\Repositories\Team\TeamRepository;
use App\Repositories\Project\IProjectRepository;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\Project\ITaskRepository;
use App\Repositories\Project\TaskRepository;
use App\Repositories\Project\ICallRepository;
use App\Repositories\Project\CallRepository;

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
        $this->app->bind(ITeamRepository::class,TeamRepository::class);
        $this->app->bind(IProjectRepository::class, ProjectRepository::class);
        $this->app->bind(ICallRepository::class,CallRepository::class);
        $this->app->bind(ITaskRepository::class, TaskRepository::class);
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
