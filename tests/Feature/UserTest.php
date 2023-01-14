<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testLoginWithUser(): void
    {
        $user = User::factory()->create();

        $view = $this
            ->actingAs($user)
            ->view('users.login');

        $view->assertSee('Log out');
    }

    public function testAuthenticate(): void
    {
        $userEmail = 'user@email.com';
        $userPass = '123123123';

        $user = User::factory()->create([
            'email' => $userEmail,
            'password' => $userPass
        ]);

        $response = $this
            ->actingAs($user)
            ->post('/authenticate', [
                'email' => $userEmail,
                'password' => $userPass
            ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function testAuthenticateWrongPass(): void
    {
        $response = $this
            ->post('/authenticate', [
                'email' => 'donow@email.com',
                'password' => 'wrongpass'
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email']);
    }

    public function testLogout(): void
    {
        Auth::shouldReceive('logout');

        $response = $this->get('/logout');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
