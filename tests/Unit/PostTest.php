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

    public function test_user_can_view_create()
    {
        $user = User::factory()->make([
            'type' => 1,
        ]);
        $this->actingAs($user);
        $response = $this->get(route('posts.create'));
        $response->assertStatus(200);

    }

    /**
     * @covers  \App\Http\Controllers\PostController::store
     */
    public function test_user_can_create_post(): array
    {
        $user = User::factory()->make([
            'id' => rand(41,62),
            'type' => 1,
        ]);
        $this->actingAs($user);
        $post = Post::factory(1)->create(['user_id' => $user->id]);

       // $user = User::where('type', 1)->first();
        //$post->user_id = $user->id;
        $response = $this->followingRedirects()->post(route('posts.store'), $post->toArray());
        $response->assertStatus(200);
       // $response->assertRedirect(route('posts.show', [$post[0]->slug]));
        $data = ["post" => $post];
        return $data;
    }
    /**
     * @depends test_user_can_create_post
     */
    public function test_user_can_view_post(array $array)
    {
        $this->actingAs($this->user);
        $post = $array['post'];
        $post = Post::where('title', $post[0]->title)->first();
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
    /**
     * @depends test_user_can_create_post
     * @covers \App\Http\Controllers\PostController::update
     */

    public function test_user_can_update_post(array $array)
    {
        $this->actingAs($this->user);
        $post = $array['post'];
        $post = Post::where('title', $post[0]->title)->first();
        //$post = Post::factory(1)->make(['user_id' => $user->id]);
        $response = $this->followingRedirects()->patch('/posts/update/'.$post->slug,
            [
                'title' => 'new name',
                'slug' => 'new-name',
            ]);
        $response->assertStatus(200);
        //$response->assertRedirect(route('business_posts.show', [$business_post[0]->slug]));
    }
   /* public function test_user_can_delete_post()
    {
        $user = User::factory()->make([
            'type' => 1,
        ]);
        $this->actingAs($user);
        $post = Post::where('content', 'Siuloma pagalba IT srityje')->first();
        $response = $this->delete('/posts/destroy/'.$post->slug);
        $response->assertRedirect(route('home'));
    }*/
}
