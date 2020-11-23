<?php

namespace AwemaPL\Repository;

use Illuminate\Support\ServiceProvider;
use AwemaPL\Repository\Commands\RepositoryMakeCommand;
use AwemaPL\Repository\Commands\RepositoryMakeMainCommand;
use AwemaPL\Repository\Commands\RepositoryScopeMakeCommand;
use AwemaPL\Repository\Commands\RepositoryScopesMakeCommand;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/awemapl-repository.php' => config_path('awemapl-repository.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                RepositoryMakeMainCommand::class,
                RepositoryMakeCommand::class,
                RepositoryScopesMakeCommand::class,
                RepositoryScopeMakeCommand::class,
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/awemapl-repository.php', 'awemapl-repository');
    }
}
