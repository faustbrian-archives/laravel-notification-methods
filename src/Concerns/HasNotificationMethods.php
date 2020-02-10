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

namespace KodeKeep\NotificationMethods\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use KodeKeep\NotificationMethods\Models\NotificationMethod;

trait HasNotificationMethods
{
    public function notificationMethods(): MorphMany
    {
        return $this->morphMany(NotificationMethod::class, 'notifiable');
    }
}
