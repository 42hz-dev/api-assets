<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
    */
    public function 회원가입(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password1234',
            'password_confirmation' => 'password1234'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'user'
            ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com'
        ]);
    }

    /**
     * @test
    */
    public function 로그인(): void
    {
        $user = User::factory()->create([
            'email' => 'john@example.com',
            'password' => bcrypt('password1234')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'john@example.com',
            'password' => 'password1234'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'user'
            ]);
    }

    /**
     * @test
    */
    public function 로그아웃():void
    {
        $user = User::factory()->create();
        $token = $user->createToken('auth_token')->plainTextToken;

        $response = $this->withToken($token)->postJson('/api/logout');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message'
            ]);
    }
}
