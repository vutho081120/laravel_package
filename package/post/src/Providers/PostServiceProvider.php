<?php

namespace Mallcode\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Mallcode\Post\View\Components\AlertComponent;

class PostServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'post');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'post');
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/post'),
        ], 'public');
        Blade::component('package-alert', AlertComponent::class);
        Blade::componentNamespace('Mallcode\\Post\\Views\\Components', 'post');
    }

    public function register()
    {
        foreach (glob(__DIR__ . '/../../helpers/*.php') as $filename) {
            require_once $filename;
        }

        $this->mergeConfigFrom(__DIR__ . '/../../config/general.php', 'general');
    }
}
