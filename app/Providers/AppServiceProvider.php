<?php

namespace App\Providers;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    $users1 = User::select("*")
      ->whereNotNull('last_seen')
     ->orderBy('last_seen', 'DESC')
      ->paginate(10);
       View::share(compact('users1'));

    }
}
