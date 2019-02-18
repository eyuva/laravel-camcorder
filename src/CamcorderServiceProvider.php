<?php

namespace Eyuva\Camcorder;


use Illuminate\Support\ServiceProvider;

class CamcorderServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->publishes([
            __DIR__.'/../config/camcorder.php' => config_path('camcorder.php'),
        ]);
    }

    public function register(){
        $this->mergeConfigFrom( __DIR__.'/../config/camcorder.php', 'camcorder');

        $this->app->singleton('camcorder', function() {
            return new Camcorder();
        });
    }
}