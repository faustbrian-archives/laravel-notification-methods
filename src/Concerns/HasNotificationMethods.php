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

namespace Konceiver\NotificationMethods\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Config;

trait HasNotificationMethods
{
    public function notificationMethods(): MorphMany
    {
        return $this->morphMany(Config::get('notification-methods.models.notification_method'), 'notifiable');
    }
}
