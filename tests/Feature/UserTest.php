<?php

namespace Tests\Feature;

use App\Models\User;

class UserTest extends LoginTest
{

    /**
     * Test get users
     *
     * @return void
     */
    public function testGetUsers()
    {
        $content = $this->testLogin();

        $this->getJson('/v1/users', [
            'Accept' => 'application/json',
            'Authorization' => "{$content->token_type} {$content->token}"
        ])->assertJsonStructure([
            'current_page',
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'links',
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total',
            'data' => ['*' => [
                'name',
                'email',
                'created_at',
                'updated_at'
            ]]
        ])->assertStatus(200);
    }

    /**
     * Test Create user
     *
     * @return void
     */
    public function testCreateUser()
    {
        $content = $this->testLogin();

        $this->postJson('/v1/users', [], [
            'Accept' => 'application/json',
            'Authorization' => "{$content->token_type} {$content->token}"
        ])
            ->assertStatus(422)
            ->assertJsonStructure([
                "message",
                "errors" => [
                    "name",
                    "email",
                ]
            ]);

        $user = User::factory()->make();

        $this->postJson('/v1/users', $user->toArray(), [
            'Accept' => 'application/json',
            'Authorization' => "{$content->token_type} {$content->token}"
        ])
            ->assertStatus(200)
            ->assertSee($user->toArray());
    }

    /**
     * Test Create user
     *
     * @return void
     */
    public function testUpdateUser()
    {
        $content = $this->testLogin();

        $user = User::factory()->create();

        $this->putJson('/v1/users/' . $user->id, [], [
            'Accept' => 'application/json',
            'Authorization' => "{$content->token_type} {$content->token}"
        ])
            ->assertStatus(422)
            ->assertJsonStructure([
                "message",
                "errors" => [
                    "name",
                    "email",
                ]
            ]);

        $this->putJson('/v1/users/' . $user->id, $user->toArray(), [
            'Accept' => 'application/json',
            'Authorization' => "{$content->token_type} {$content->token}"
        ])
            ->assertStatus(200)
            ->assertSee($user->toArray());
    }
}
