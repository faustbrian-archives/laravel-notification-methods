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

use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
use Nexmo\Client;
use Nexmo\Client\Credentials\Basic;

class NexmoChannel
{
    public function send($notifiable, Notification $notification)
    {
        $notifiable->notificationMethods()->whereChannel('nexmo')->each(function ($channel) use ($notifiable, $notification) {
            $notifiable = new Recipient($channel);
            $notifiableConfig = $notifiable->routeNotificationFor('nexmo', $notification);

            $message = $notification->toNexmo($notifiable);

            if (is_string($message)) {
                $message = new NexmoMessage($message);
            }

            $this->getClient($notifiableConfig['api_key'], $notifiableConfig['api_secret'])->message()->send([
                'type'       => $message->type,
                'from'       => $message->from ?: $notifiableConfig['from'],
                'to'         => $notifiableConfig['to'],
                'text'       => trim($message->content),
                'client_ref' => $message->clientReference,
            ]);
        });
    }

    /**
     * Create a new nexmo client instance.
     *
     * @param string $key
     * @param string $secret
     *
     * @return Client
     */
    private function getClient(string $key, string $secret): Client
    {
        return new Client(new Basic($key, $secret));
    }
}
