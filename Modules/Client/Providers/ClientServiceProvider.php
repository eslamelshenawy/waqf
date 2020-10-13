<?php

namespace Modules\Client\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Client', 'Database/Migrations'));

//        // adding global middleware
//        $kernel = $this->app->make('Illuminate\Contracts\Http\Kernel');
//        $kernel->pushMiddleware('Modules\Client\Http\Middleware\RedirectIfAuthenticated');

        $router->aliasMiddleware('already-user', \Modules\Client\Http\Middleware\RedirectIfAuthenticated::class);
//        $this->aliasMiddleware('CanReadInvoiceMiddleware', \Modules\Client\Http\Middleware\RedirectIfAuthenticated::class);

        app()->setLocale('ar');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Client', 'Config/config.php') => config_path('client.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Client', 'Config/config.php'), 'client'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/client');

        $sourcePath = module_path('Client', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/client';
        }, \Config::get('view.paths')), [$sourcePath]), 'client');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/client');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'client');
        } else {
            $this->loadTranslationsFrom(module_path('Client', 'Resources/lang'), 'client');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Client', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
