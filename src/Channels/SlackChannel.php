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

namespace Konceiver\NotificationMethods\Channels;

use Illuminate\Notifications\Channels\SlackWebhookChannel;
use Illuminate\Notifications\Notification;

class SlackChannel extends SlackWebhookChannel
{
    public function send($notifiable, Notification $notification)
    {
        return $notifiable->notificationMethods()->whereChannel('slack')->each(function ($channel) use ($notifiable, $notification) {
            $notifiable = new Recipient($channel);
            $notifiableConfig = $notifiable->routeNotificationFor('slack', $notification);

            $this->http->post($notifiableConfig, $this->buildJsonPayload($notification->toSlack($notifiable)));
        });
    }
}
