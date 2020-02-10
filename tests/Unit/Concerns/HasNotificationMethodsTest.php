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

namespace KodeKeep\NotificationMethods\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use KodeKeep\NotificationMethods\Tests\TestCase;
use KodeKeep\NotificationMethods\Tests\Unit\ClassThatHasNotificationMethods;

/**
 * @covers \KodeKeep\NotificationMethods\Concerns\HasNotificationMethods
 */
class HasNotificationMethodsTest extends TestCase
{
    /** @test */
    public function morphs_to_a_notifiable_that_morphs_many_notification_methods(): void
    {
        $this->loadLaravelMigrations(['--database' => 'testbench']);
        $this->artisan('migrate', ['--database' => 'testbench'])->run();

        $method = ClassThatHasNotificationMethods::create([
            'name'     => 'John Doe',
            'email'    => 'john@doe.com',
            'password' => 'password',
        ])->notificationMethods()->create([
            'name'        => 'My Channel',
            'channel'     => 'discord',
            'discord_url' => 'https://google.com',
        ]);

        $this->assertInstanceOf(MorphTo::class, $method->notifiable());
        $this->assertInstanceOf(ClassThatHasNotificationMethods::class, $method->notifiable);
        $this->assertInstanceOf(MorphMany::class, $method->notifiable->notificationMethods());
    }
}
