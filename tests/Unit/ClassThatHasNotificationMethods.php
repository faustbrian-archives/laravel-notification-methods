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

namespace Konceiver\NotificationMethods\Tests\Unit;

use Illuminate\Foundation\Auth\User;
use Konceiver\NotificationMethods\Concerns\HasNotificationMethods;

class ClassThatHasNotificationMethods extends User
{
    use HasNotificationMethods;

    public $table = 'users';

    public $guarded = [];
}
