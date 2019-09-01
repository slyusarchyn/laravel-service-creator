<?php

namespace Slyusarchyn\LaravelServiceCreator;

use Illuminate\Support\ServiceProvider;
use Slyusarchyn\LaravelServiceCreator\App\Console\Commands\ServiceMakeCommand;

/**
 * Class LaravelServiceCreatorServiceProvider
 * @package Slyusarchyn\LaravelServiceCreator
 * @author  Alexander Slyusarchyn <alex.slyusarchyn@gmail.com>
 */
class LaravelServiceCreatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ServiceMakeCommand::class
            ]);
        }
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
    }
}