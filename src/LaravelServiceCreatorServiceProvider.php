<?php

namespace Slyusarchyn\LaravelServiceCreator;

use App\Console\Commands\ServiceMakeCommand;
use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelServiceCreatorServiceProvider
 * @package Slyusarchyn\LaravelServiceCreator\LaravelServiceCreatorServiceProvider
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