<?php

namespace App\Providers;

use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Observers\CategoryObserver;
use App\Observers\CouponObserver;
use App\Observers\ProductObserver;
use Illuminate\Pagination\Paginator;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
    }
}
