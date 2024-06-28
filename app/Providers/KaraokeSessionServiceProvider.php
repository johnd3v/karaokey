<?php

namespace App\Providers;

use App\Models\KaraokeSession;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class KaraokeSessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton('currentSession',function($app){
            return KaraokeSession::where("user_id",auth()->id())->currentDay()->first();
        });
    }
}
