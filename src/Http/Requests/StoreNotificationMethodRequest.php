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

namespace Konceiver\NotificationMethods\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

class StoreNotificationMethodRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name'    => ['required', 'string', 'max:255'],
            'channel' => ['required', 'string', Rule::in($this->getSupportedChannels())],
        ];

        foreach (Config::get('notification-methods.channels') as $channel) {
            foreach ($channel['properties'] as $propertyName => $propertyRules) {
                $rules[$propertyName] = $propertyRules;
            }
        }

        return $rules;
    }

    private function getSupportedChannels(): array
    {
        return array_keys(Config::get('notification-methods.channels'));
    }
}
