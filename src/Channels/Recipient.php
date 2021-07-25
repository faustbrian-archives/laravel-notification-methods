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

use Illuminate\Notifications\Notifiable;
use Konceiver\NotificationMethods\Models\NotificationMethod;

class Recipient
{
    use Notifiable;

    public function __construct(NotificationMethod $channel)
    {
        $this->channel = $channel;
    }

    public function routeNotificationForDiscord(): string
    {
        return $this->channel->discord_url;
    }

    public function routeNotificationForMail(): string
    {
        return $this->channel->mail_address;
    }

    public function routeNotificationForNexmo(): array
    {
        return [
            'api_key'    => $this->channel->nexmo_api_key,
            'api_secret' => $this->channel->nexmo_api_secret,
        ];
    }

    public function routeNotificationForPushbullet(): string
    {
        return $this->channel->pushbullet_token;
    }

    public function routeNotificationForPushover(): array
    {
        return [
            'user'  => $this->channel->pushover_user,
            'token' => $this->channel->pushover_token,
        ];
    }

    public function routeNotificationForSlack(): string
    {
        return $this->channel->slack_url;
    }

    public function routeNotificationForWebhook(): string
    {
        return $this->channel->webhook_url;
    }
}
