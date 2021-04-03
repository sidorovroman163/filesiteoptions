<?php

namespace SidorovRoman\FileSiteOptions;

use App;
use Illuminate\Support\ServiceProvider;
class FileSiteOptionsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * TEST
     *
     * @return void
     */
    public function boot()
    {
       
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        App::singleton('fsoptions', function () {
            return new Repository();
        });
    }
}
