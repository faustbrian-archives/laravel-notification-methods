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

use GuzzleHttp\ClientInterface;
use Illuminate\Notifications\Notification;

class PushoverChannel
{
    public function send($notifiable, Notification $notification): void
    {
        $notifiable->notificationMethods()->whereChannel('pushover')->each(function ($channel) use ($notifiable, $notification) {
            $notifiable = new Recipient($channel);
            $notifiableConfig = $notifiable->routeNotificationFor('pushover', $notification);

            $response = resolve(ClientInterface::class)->post('https://api.pushover.net/1/messages.json', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => $notification->toPushover($notifiable) + $notifiableConfig,
            ]);

            if ($response->getStatusCode() >= 300 || $response->getStatusCode() < 200) {
                // failed to send...
            }
        });
    }
}
