<?php

namespace GMJ\LaravelBlock2ShoppingThumbnail;

use GMJ\LaravelBlock2ShoppingThumbnail\Http\Livewire\Backend;
use GMJ\LaravelBlock2ShoppingThumbnail\View\Components\Frontend;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire;

class LaravelBlock2ShoppingThumbnailServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . "/routes/web.php", 'LaravelBlock2ShoppingThumbnail');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'LaravelBlock2ShoppingThumbnail');

        Blade::component("LaravelBlock2ShoppingThumbnail", Frontend::class);
        Livewire::component("LaravelBlock2ShoppingThumbnail", Backend::class);

        $this->publishes([
            __DIR__ . "/config/laravel_block2_shopping_thumbnail_config.php" => config_path("gmj/laravel_block2_shopping_thumbnail_config.php"),
            __DIR__ . '/database/seeders' => database_path('seeders'),
        ], 'GMJ\LaravelBlock2ShoppingThumbnail');
    }


    public function register()
    {
    }
}
