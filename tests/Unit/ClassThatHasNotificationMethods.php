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

namespace KodeKeep\NotificationMethods\Tests\Unit;

use Illuminate\Foundation\Auth\User;
use KodeKeep\NotificationMethods\Concerns\HasNotificationMethods;

class ClassThatHasNotificationMethods extends User
{
    use HasNotificationMethods;

    public $table = 'users';

    public $guarded = [];
}
