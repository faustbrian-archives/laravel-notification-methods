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

class PushbulletChannel
{
    public function send($notifiable, Notification $notification): void
    {
        $notifiable->notificationMethods()->whereChannel('pushbullet')->each(function ($channel) use ($notifiable, $notification) {
            $notifiable = new Recipient($channel);
            $notifiableConfig = $notifiable->routeNotificationFor('pushbullet', $notification);

            $response = resolve(ClientInterface::class)->post('https://api.pushbullet.com/v2/pushes', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Access-Token' => $notifiableConfig,
                ],
                'json' => $notification->toPushbullet($notifiable),
            ]);

            if ($response->getStatusCode() >= 300 || $response->getStatusCode() < 200) {
                // failed to send...
            }
        });
    }
}
