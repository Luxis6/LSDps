<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PostTest extends TestCase
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
        $response = $this->get(route('posts'));
        $response->assertStatus(200);
    }
    public function test_user_can_view_categories_post_index_page()
    {
        $this->actingAs($this->user);
        $sub_category = Category::where('parent_id', 1)->first();
        $main_category = Category::where('parent_id', null)->first();
        $response = $this->get('/posts/categories/'.$main_category->slug. '/'. $sub_category->slug);
        $response->assertStatus(200);
    }
    public function test_user_can_view_post()
    {
        $this->actingAs($this->user);
        $post = Post::first();
        $response = $this->get('/posts/'.$post->slug);
        $response->assertStatus(200);

    }
    public function test_user_cant_view_post()
    {
        $this->actingAs($this->user);
        $slug = 'nera';
        $response = $this->get('/posts/'.$slug);
        $response->assertStatus(404);

    }
    public function test_user_can_view_create()
    {
        $user = User::factory()->make([
            'type' => 1,
        ]);
        $this->actingAs($user);
        $response = $this->get(route('posts.create'));
        $response->assertStatus(200);

    }
    public function test_user_can_create_post(): Post
    {
        $user = User::factory()->make([
            'type' => 1,
        ]);
        $this->actingAs($user);
        $post = Post::factory(1)->create();

        $user = User::where('type', 1)->first();
        $post->user_id = $user->id;
        $response = $this->post(route('posts.store'), $post->toArray());
        $response->assertRedirect(route('posts.show', [$post[0]->slug]));
        return $post;
    }

    public function test_user_can_delete_post()
    {
        $user = User::factory()->make([
            'type' => 1,
        ]);
        $this->actingAs($user);
        $post = Post::where('content', 'Siuloma pagalba IT srityje')->first();
        $response = $this->delete('/posts/destroy/'.$post->slug);
        $response->assertRedirect(route('home'));
    }
}
