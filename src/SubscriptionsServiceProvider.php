<?php

namespace Osen\Subscriptions;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;
use Osen\Subscriptions\Console\Commands\InstallCommand;

class SubscriptionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        // Commands
        AboutCommand::add('Laravel Subscriptions', fn () => ['Version' => '1.0.0']);
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }

        // Config
        $this->publishes([
            __DIR__ . '/../config/subscriptions.php' => config_path('subscriptions.php'),
        ]);

        // Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Translations
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'subscriptions');
        $this->publishes([
            __DIR__ . '/../lang' => $this->app->langPath('vendor/subscriptions'),
        ]);

        // Views
        /**
         * Bootstrap any package services.
         */
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'subscriptions');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/subscriptions'),
        ]);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/subscriptions.php',
            'subscriptions'
        );
    }
}