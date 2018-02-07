<?php

namespace Modules\Pages\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    /**
     *  Executado quando a aplicação inicia
     */
    public function boot()
    {
        // mapeia o arquivo de rotas
        Route::namespace('Modules\Pages\Http\Controllers')
            ->middleware(['web'])
            ->group(__DIR__ . '/../Routes/web.php');

        // mapeia as views
        $this->loadViewsFrom(__DIR__ . '/../Views', 'Page');

        // mapeia as migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../Lang', 'Page');

        $this->publishes([
            __DIR__ . '/../Views' => resource_path('views/vendor/Page'),
       ], 'views');

        $this->publishes([
            __DIR__ . '/../Lang' => resource_path('lang/vendor/Page')
        ], 'lang');

        $this->publishes([
            __DIR__ . '/../config/pages.php' => config_path('pages.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/../public/assets' => public_path('assets/pages')
        ], 'assets');
    }

    /**
     * Executado quando a aplicação é registrada
     */
    public function register()
    {
        // permite a sobreposição das configurações, se não usa as default
        $this->mergeConfigFrom(
            __DIR__ . '/../config/pages.php',
            'pages'
        );
    }
}