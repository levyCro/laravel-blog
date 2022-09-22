<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        //
        Schema::defaultStringLength(191);
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (User $user) {
            return $user->username === 'levy' || $user->username === 'bobo' || $user->username === 'thomas'; 
        });

        Blade::if('admin', function (){
            return request()->user()?->can('admin');
        });
    }
}
