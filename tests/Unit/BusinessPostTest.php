<?php

namespace Tests\Unit;

use App\Models\Business_Post;
use App\Models\Category;
use App\Models\User;
use Tests\TestCase;

class BusinessPostTest extends TestCase
{
    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_view_post_index_page()
    {
        $user = User::factory()->make([
            'type' => 1,
        ]);
        $this->actingAs($user);
        $response = $this->get('/business_posts');
        $response->assertStatus(200);
    }
    public function test_user_can_view_categories_post_index_page()
    {
        $this->actingAs($this->user);
        $main_category = Category::where('parent_id', null)->first();
        $response = $this->get('/business_posts/categories/'.$main_category->slug);
        $response->assertStatus(200);
    }
    public function test_user_can_view_post()
    {
        $this->actingAs($this->user);
        $business_post = Business_Post::first();
        $response = $this->get('/business_posts/'.$business_post->slug);
        $response->assertStatus(200);

    }
    public function test_user_cant_view_post()
    {
        $this->actingAs($this->user);
        $slug = 'nera';
        $response = $this->get('/business_posts/'.$slug);
        $response->assertStatus(404);

    }
    public function test_user_can_view_create()
    {
        $user = User::factory()->make([
            'type' => 1,
        ]);
        $this->actingAs($user);
        $response = $this->get(route('business_posts.create'));
        $response->assertStatus(200);

    }
    public function test_user_can_create_post(): Business_Post
    {
        $user = User::factory()->make([
            'type' => 1,
        ]);
        $this->actingAs($user);
        $business_post = Business_Post::factory(1)->create();
        $user = User::where('type', 1)->first();
        $business_post->user_id = $user->id;
        $response = $this->post(route('business_posts.store'), $business_post->toArray());
        $response->assertRedirect(route('business_posts.show', [$business_post[0]->slug]));
        return $business_post;
    }
    /*public function test_user_can_update_post(Business_Post $business_post)
    {
        $this->actingAs($this->user);
        $business_post = json_decode($business_post);
        $business_post = Business_Post::where('title', $business_post->title)->first();
        $response = $this->patch('/business_posts/update/'.$business_post->slug,
            [
                'name' => 'new name',
                'slug' => 'new-name',
            ]);
        $response->assertRedirect(route('business_posts.show', [$business_post[0]->slug]));
    }*/
    public function test_user_can_delete_post()
    {
        $user = User::factory()->make([
            'type' => 1,
        ]);
        $this->actingAs($user);
        $business_post = Business_Post::where('title', 'random')->first();
        $response = $this->delete('/business_posts/destroy/'.$business_post->slug);
        $response->assertRedirect(route('business_home'));
    }
}
