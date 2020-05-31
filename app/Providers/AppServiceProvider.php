<?php

namespace App\Providers;

use App\Category;
use App\Observers\CategoryObserver;
use App\Observers\ProductObserver;
use App\Product;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //URL::forceScheme('https');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $university = 'IUG';
        $college = 'IT';
        $course = 'Special Topics in SD';

        $data = [
            'university' => $university,
            'college' => $college,
            'course' => $course
        ];

        View::share('data', $data);

        Blade::directive('iug', function ($expression) {
            return "<?php
		    echo 'Welcome to '.$expression
		    ?>";
        });

        Product::observe(ProductObserver::class);

    }
}
