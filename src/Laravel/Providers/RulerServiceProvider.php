<?php

namespace HoaThis\LaravelHoaRuler\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use HoaThis\LaravelHoaRuler\Manager\RulerManager;

class RulerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
		// check the config for both lumen & laravel
		$source = realpath(__DIR__ . '/../config/ruler.php');
        if (class_exists('Illuminate\Foundation\Application', false) && $this->app->runningInConsole())
        {
            $this->publishes([$source => config_path('ruler.php')]);
        }
        elseif (class_exists('Laravel\Lumen\Application', false))
        {
            $rhis->app->configure('ruler');
        }

		// merge the config with the defined one
		$this->mergeConfigFrom($source, 'ruler');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
		$this->app->singleton('ruler', function ($app)
		{
            return new RulerManager($app->instance('\Illuminate\Contracts\Cache\Factory'), $app['config']);
        });
        $app->alias('ruler', RulerManager::class);
    }
    
    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'ruler'
        ];
    }
}
