<?php

namespace Tests\Unit;

use App\Models\User;
use DB;
use Tests\TestCase;

class AdminTest extends TestCase
{
    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make([
            'type' => 2,
        ]);
    }
    public function test_admin_can_see_all_users()
    {
        $this->actingAs($this->user);
        $response = $this->get('/admin/users');
        $response->assertStatus(200);
    }
    public function test_admin_can_verify_user()
    {
        $this->actingAs($this->user);
        $get_user = DB::select('select * from users ORDER BY id DESC LIMIT 1');
        $response = $this->from('/admin/users')->get('/admin/verify/user/'.$get_user[0]->id);
        $response->assertRedirect('/admin/users');
    }
}
