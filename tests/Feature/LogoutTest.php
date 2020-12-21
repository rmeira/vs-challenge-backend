<?php

namespace Tests\Feature;

class LogoutTest extends LoginTest
{

    /**
     * Test success logout
     *
     * @return void
     */
    public function testLogout()
    {
        $content = $this->testLogin();

        $this->postJson('/v1/auth/logout', [], [
            'Authorization' => "{$content->token_type} {$content->token}"
        ])->assertStatus(200);
    }
}
