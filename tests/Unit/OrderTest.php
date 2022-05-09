<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class OrderTest extends TestCase
{
    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make([
            'id' => rand(41,62),
            'type' => 1,
        ]);
    }
    public function test_user_can_see_all_orders()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('orders'));
        $response->assertStatus(200);
    }
    public function test_user_can_view_create()
    {
        $this->actingAs($this->user);
        $post = Post::first();
        $response = $this->get(route('order', ['slug' => $post->slug]));
        $response->assertStatus(200);
    }
    public function test_user_can_create_application()
    {
        $this->actingAs($this->user);
        $post = Post::first();

        $order = Order::factory()->make(['post_id' => $post->id, 'user_id' => $this->user->id]);
        $response = $this->post(route('orders.store', ['slug' => $post->slug]), $order->toArray());
        $response->assertRedirect(route('home'));
    }
}
