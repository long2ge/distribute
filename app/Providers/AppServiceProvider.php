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
        | laravel-modules   composer require nwidart/laravel-modules
        |--------------------------------------------------------------------------
        */
        $this->app->bind('path.public', function() {
            return __DIR__ . 'public/';
        });
        $this->app->configure('modules');
        $this->app->register(\Nwidart\Modules\LumenModulesServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | laravel-cors  composer require fruitcake/laravel-cors
        |--------------------------------------------------------------------------
        */
        $this->app->configure('cors');
        $this->app->register(\Fruitcake\Cors\CorsServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | laravel-ide-helper    composer require --dev barryvdh/laravel-ide-helper
        |--------------------------------------------------------------------------
        */
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        /*
        |--------------------------------------------------------------------------
        | redis composer require predis/predis  composer require illuminate/redis
        |--------------------------------------------------------------------------
        */
        $this->app->register(\Illuminate\Redis\RedisServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | laravel-apidoc-generator  composer require mpociot/laravel-apidoc-generator
        |--------------------------------------------------------------------------
        */
        $this->app->configure('apidoc');
        $this->app->register(\Mpociot\ApiDoc\ApiDocGeneratorServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | laravel-wechat    composer require "overtrue/laravel-wechat"
        |--------------------------------------------------------------------------
        */
        $this->app->configure('wechat');
        $this->app->register(\Overtrue\LaravelWeChat\ServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | lumen-passport    composer require dusterio/lumen-passport
        |--------------------------------------------------------------------------
        */
        $this->app->configure('auth');
        $this->app->register(\Laravel\Passport\PassportServiceProvider::class);
        $this->app->register(\Dusterio\LumenPassport\PassportServiceProvider::class);

        /*
        |--------------------------------------------------------------------------
        | 引入其他的包
        |   composer require "overtrue/easy-sms"
        |   composer require league/fractal
        |--------------------------------------------------------------------------
        */
    }
}
