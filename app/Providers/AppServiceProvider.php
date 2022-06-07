<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

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
        view()->composer("*", function ($view) {
            if (Auth::check()) {
                $auth_id = Auth::user()->id;
                $categories = Category::whereRelation(
                    "store",
                    "user_id",
                    $auth_id
                )
                    ->where("is_active", true)
                    ->get();
                View::share("categories", $categories);
            }
        });
    }
}
