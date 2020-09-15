<?php


namespace App\Providers;

use App\Services\DateCalculator;
use Illuminate\Support\ServiceProvider;

class DateServiceProvider extends ServiceProvider{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\IDueDateCalculator.php', function ($app) {
            return new DateCalculator();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
