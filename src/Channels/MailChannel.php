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

namespace KodeKeep\NotificationMethods\Channels;

use Illuminate\Notifications\Channels\MailChannel as BaseChannel;
use Illuminate\Notifications\Notification;

class MailChannel
{
    public function send($notifiable, Notification $notification): void
    {
        $notifiable->notificationMethods()->whereChannel('mail')->each(function ($channel) use ($notification) {
            resolve(BaseChannel::class)->send(new Recipient($channel), $notification);
        });
    }
}
