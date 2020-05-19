<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_register()
    {
        $user_details = [
            'name' => 'user name',
            'email' => 'domain@256.org',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $this->postJson('api/v1/auth/register', $user_details)
            ->assertCreated();

        $this->assertDatabaseHas('users', ['name' => $user_details['name']]);
    }
}
