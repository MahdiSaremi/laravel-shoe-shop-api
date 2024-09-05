<?php

namespace App\Providers;

use App\Models\ClubHistory;
use App\Models\File;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Relation::morphMap([
            User::class => 'User',
            Product::class => 'Product',
            ProductColor::class => 'ProductColor',
            ProductSize::class => 'ProductSize',
            ProductImage::class => 'ProductImage',
            ClubHistory::class => 'ClubHistory',
            File::class => 'File',
            Offer::class => 'Offer',
            Order::class => 'Order',
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
    }
}
