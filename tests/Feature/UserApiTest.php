<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_users()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_a_user()
    {
        $data = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password_hash' => 'hashedpassword',
        ];

        $response = $this->postJson('/api/users', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['username' => 'testuser']);
    }

    // Add more tests for show, update, and delete
}