<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class, ['password' => 'password'])->create();
    }

    /**
     * @test
     */
    public function a_valid_user_can_login()
    {
        $this->postJson('api/v1/auth/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ])
            ->assertOK();
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_reset_their_password()
    {
        $this->signIn($this->user)
            ->putJson('api/v1/auth/resetPassword', [
                'current_password' => 'password',
                'password' => 'helloworld',
                'password_confirmation' => 'helloworld',
            ])
            ->assertOK();
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_logout()
    {
        $this->signIn($this->user)
            ->postJson('api/v1/auth/logout')
            ->assertOK();
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_refresh_their_token()
    {
        $token = $this->postJson('api/v1/auth/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ])
            ->json('token');

        $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('api/v1/auth/refreshToken')
            ->assertOK();
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_retrieve_their_details()
    {
        $this->signIn($this->user)
            ->getJson('api/v1/auth/user')
            ->assertOK()
            ->assertJson(['name' => $this->user->name]);
    }
}
