<?php

namespace App\Providers;

use App\Http\Services\TagsSynchronizer;
use App\Models\Tags;
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
        view()->composer('layout', function ($view) {
            $view->with('tagsCloud', Tags::all());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
