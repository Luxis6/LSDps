<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class HomeTest extends TestCase
{
    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make();
    }
    public function test_user_can_see_home_page()
    {
        $this->actingAs($this->user);
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
