<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Notification Methods.
 *
 * (c) KodeKeep <hello@kodekeep.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KodeKeep\NotificationMethods\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Config;

class NotificationMethod extends Model
{
    public function getFillable(): array
    {
        $result = ['name', 'channel'];

        foreach (Config::get('notification-methods.channels') as $channel) {
            foreach (\array_keys($channel['properties']) as $property) {
                $result[] = $property;
            }
        }

        return $result;
    }

    public function notifiable(): MorphTo
    {
        return $this->morphTo('notifiable');
    }

    public function getTable(): string
    {
        return Config::get('notification-methods.tables.notification_methods');
    }
}
