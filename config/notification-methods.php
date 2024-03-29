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

use Konceiver\NotificationMethods\Models\NotificationMethod;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Models
    |--------------------------------------------------------------------------
    |
    | Here you may specify which model should be used to interact with
    | notification methods and the database.
    |
    | You generally will not need to touch this. If you do, make sure you
    | stay compatible with the basic functionality the base model provides.
    |
    */

    'models' => [

        'notification_method' => NotificationMethod::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Tables
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    'tables' => [

        'notification_methods' => 'notification_methods',

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Channels
    |--------------------------------------------------------------------------
    |
    | Here you may specify which channels are supported. You can specify rules
    | and when a channel is enabled or disabled by using environment variables.
    |
    */

    'channels' => [
        'discord' => [
            'properties' => [
                'discord_url' => ['nullable', 'url', 'required_if:channel,discord'],
            ],
        ],
        'mail' => [
            'properties' => [
                'mail_address' => ['nullable', 'email', 'required_if:channel,mail'],
            ],
        ],
        'nexmo' => [
            'properties' => [
                'nexmo_api_key'    => ['nullable', 'string', 'required_if:channel,nexmo'],
                'nexmo_api_secret' => ['nullable', 'string', 'required_if:channel,nexmo'],
                'nexmo_from'       => ['nullable', 'integer', 'required_if:channel,nexmo'],
                'nexmo_to'         => ['nullable', 'integer', 'required_if:channel,nexmo'],
            ],
        ],
        'pushbullet' => [
            'properties' => [
                'pushbullet_token' => ['nullable', 'string', 'required_if:channel,pushbullet'],
            ],
        ],
        'pushover' => [
            'properties' => [
                'pushover_user'  => ['nullable', 'string', 'required_if:channel,pushover'],
                'pushover_token' => ['nullable', 'string', 'required_if:channel,pushover'],
            ],
        ],
        'slack' => [
            'properties' => [
                'slack_url' => ['nullable', 'url', 'required_if:channel,slack'],
            ],
        ],
        'webhook' => [
            'properties' => [
                'webhook_url' => ['nullable', 'url', 'required_if:channel,webhook'],
            ],
        ],
    ],

];
