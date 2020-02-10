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

use KodeKeep\NotificationMethods\Models\NotificationMethod;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Salt
    |--------------------------------------------------------------------------
    |
    | Here you may specify which model should be used to interact with
    | notification methods and the database.
    |
    | You generally will not need to touch this. If you do, make sure you
    | stay compatible with the basic functionality the base model provides.
    |
    */

    'model' => NotificationMethod::class,

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
            'enabled'    => true,
            'properties' => [
                'discord_url' => ['nullable', 'url', 'required_if:channel,discord'],
            ],
        ],
        'mail' => [
            'enabled'    => true,
            'properties' => [
                'mail_address' => ['nullable', 'email', 'required_if:channel,mail'],
            ],
        ],
        'nexmo' => [
            'enabled'    => true,
            'properties' => [
                'nexmo_api_key'    => ['nullable', 'string', 'required_if:channel,nexmo'],
                'nexmo_api_secret' => ['nullable', 'string', 'required_if:channel,nexmo'],
                'nexmo_from'       => ['nullable', 'integer', 'required_if:channel,nexmo'],
                'nexmo_to'         => ['nullable', 'integer', 'required_if:channel,nexmo'],
            ],
        ],
        'pushbullet' => [
            'enabled'    => true,
            'properties' => [
                'pushbullet_token' => ['nullable', 'string', 'required_if:channel,pushbullet'],
            ],
        ],
        'pushover' => [
            'enabled'    => true,
            'properties' => [
                'pushover_user'  => ['nullable', 'string', 'required_if:channel,pushover'],
                'pushover_token' => ['nullable', 'string', 'required_if:channel,pushover'],
            ],
        ],
        'slack' => [
            'enabled'    => true,
            'properties' => [
                'slack_url' => ['nullable', 'url', 'required_if:channel,slack'],
            ],
        ],
        'webhook' => [
            'enabled'    => true,
            'properties' => [
                'webhook_url' => ['nullable', 'url', 'required_if:channel,webhook'],
            ],
        ],
    ],

];
