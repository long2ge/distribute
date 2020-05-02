<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        |--------------------------------------------------------------------------
        | laravel-modules
        |--------------------------------------------------------------------------
        */
        $this->app->bind('path.public', function() {
            return __DIR__ . 'public/';
        });
        $this->app->configure('modules');
        $this->app->register(\Nwidart\Modules\LumenModulesServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | laravel-cors
        |--------------------------------------------------------------------------
        */
        $this->app->configure('cors');
        $this->app->register(\Fruitcake\Cors\CorsServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | laravel-ide-helper
        |--------------------------------------------------------------------------
        */
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        /*
        |--------------------------------------------------------------------------
        | redis
        |--------------------------------------------------------------------------
        */
        $this->app->register(\Illuminate\Redis\RedisServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | laravel-apidoc-generator
        |--------------------------------------------------------------------------
        */
        $this->app->configure('apidoc');
        $this->app->register(\Mpociot\ApiDoc\ApiDocGeneratorServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | laravel-wechat
        |--------------------------------------------------------------------------
        */
        $this->app->configure('wechat');
        $this->app->register(\Overtrue\LaravelWeChat\ServiceProvider::class);

    }
}
