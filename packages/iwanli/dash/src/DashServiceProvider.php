<?php

namespace Iwanli\Dash;

use Illuminate\Support\ServiceProvider;
use Iwanli\Dash\Console\BuildModuleCommand;
class DashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([BuildModuleCommand::class]);
        }

        $this->publishes([
            __DIR__.'/config/idash.php' => config_path('idash.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/assets' => public_path('idash'),
        ], 'public');

        // setting migrations
        $this->loadMigrationsFrom(__DIR__.'/migrations');


        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(
            __DIR__.'/config/idash.php', 'idash'
        );

        $providerGroups = config('idash.providers', []);

        $this->registerProviders($providerGroups);

        $aliases = config('idash.aliases',[]);
        $this->registerAliases($aliases);
    }

    /**
     * 注册provider
     * @author 晚黎
     * @date   2017-05-05T15:22:53+0800
     * @param  array                    $providers [description]
     * @return [type]                              [description]
     */
    private function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            $this->app->register($provider);
        }
    }
    /**
     * 注册aliases
     * @author 晚黎
     * @date   2017-05-05T15:24:09+0800
     * @param  array                    $aliases [description]
     * @return [type]                            [description]
     */
    private function registerAliases(array $aliases)
    {
        foreach ($aliases as $alias => $abstract) {
            $this->app->alias($abstract, $alias);
        }
    }
}
