<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Notification Methods.
 *
 * (c) Konceiver <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\NotificationMethods\Providers;

use Illuminate\Support\ServiceProvider;

class NotificationMethodsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/notification-methods.php', 'notification-methods');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/notification-methods.php' => $this->app->configPath('notification-methods.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../../database/migrations/' => $this->app->databasePath('migrations'),
            ], 'migrations');
        }
    }
}
