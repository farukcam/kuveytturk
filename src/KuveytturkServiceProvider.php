<?php

/**
 * Description of KuveytturkServiceProvider.php
 *
 * @author Faruk Çam <mail@farukix.com>
 * Copyright (c) 2018 | farukix.com
 */

namespace Farukcam\Kuveytturk;

use Illuminate\Support\ServiceProvider;
use Farukcam\Kuveytturk\Http\Base\Kuveytturk;

class KuveytturkServiceProvider extends ServiceProvider {


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('kuveytturk.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('kuveytturk', function ($app)
        {
            return new Kuveytturk;
        });
    }


}
