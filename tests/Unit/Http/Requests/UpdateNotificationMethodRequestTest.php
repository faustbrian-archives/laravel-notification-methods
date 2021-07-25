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

namespace Konceiver\NotificationMethods\Tests\Unit\Http\Requests;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Konceiver\NotificationMethods\Http\Requests\UpdateNotificationMethodRequest;
use Konceiver\NotificationMethods\Tests\TestCase;

/**
 * @covers \Konceiver\NotificationMethods\Http\Requests\UpdateNotificationMethodRequest
 */
class UpdateNotificationMethodRequestTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();

        Route::post('/', fn () => resolve(UpdateNotificationMethodRequest::class));
    }

    /**
     * @test
     * @dataProvider passScenarios
     */
    public function requests_should_pass(array $data)
    {
        $this
            ->postJson('/', $data)
            ->assertOk()
            ->assertJsonMissingValidationErrors();
    }

    /**
     * @test
     * @dataProvider failScenarios
     */
    public function requests_should_fail(array $data, array $errors)
    {
        $this
            ->postJson('/', $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors($errors);
    }

    public function passScenarios(): array
    {
        $faker = Factory::create();

        return [
            'request_should_pass_when_all_required_data_is_provided_and_valid' => [
                'data' => [
                    'name'        => $faker->name,
                    'channel'     => 'discord',
                    'discord_url' => $faker->url,
                ],
            ],
        ];
    }

    public function failScenarios(): array
    {
        $faker = Factory::create();

        return [
            'request_should_fail_when_no_name_is_provided' => [
                'data' => [
                    'channel' => 'discord',
                ],
                'errors' => [
                    'name' => 'The name field is required.',
                ],
            ],
        ];
    }
}
