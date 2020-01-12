<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $post_publish_sql = "update `wink_posts` set `published` = ?, `wink_posts`.`updated_at` = ? where `id` = ?";

        // DB::listen(function ($query) use ($post_publish_sql) {
        //     if ($post_publish_sql === $query->sql) {
        //         Artisan::call('generate:feed');
        //         Artisan::call('generate:index');
        //     }
        // });
    }
}
