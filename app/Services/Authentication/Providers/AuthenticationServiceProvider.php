<?php

namespace App\Services\Authentication\Providers;

use Lang;
use View;
use Illuminate\Support\ServiceProvider;
use App\Services\Authentication\Providers\RouteServiceProvider;
use App\Services\Authentication\Providers\BroadcastServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap migrations and factories for:
     * - `php artisan migrate` command.
     * - factory() helper.
     *
     * Previous usage:
     * php artisan migrate --path=src/Services/Authentication/database/migrations
     * Now:
     * php artisan migrate
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom([
            realpath(__DIR__ . '/../database/migrations')
        ]);
    }

    /**
    * Register the Authentication service provider.
    *
    * @return void
    */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(BroadcastServiceProvider::class);

        $this->registerResources();
    }

    /**
     * Register the Authentication service resource namespaces.
     *
     * @return void
     */
    protected function registerResources()
    {
        // Translation must be registered ahead of adding lang namespaces
        $this->app->register(TranslationServiceProvider::class);

        Lang::addNamespace('authentication', realpath(__DIR__.'/../resources/lang'));

        View::addNamespace('authentication', base_path('resources/views/vendor/authentication'));
        View::addNamespace('authentication', realpath(__DIR__.'/../resources/views'));
    }
}
