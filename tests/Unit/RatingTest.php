<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\Rating;
use App\Models\User;
use Tests\TestCase;

class RatingTest extends TestCase
{
    protected User $user;
    protected Post $post;
    protected Rating $rating;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make([
            'type' => 1,
        ]);
        $this->post = Post::factory()->make();
    }
    public function test_user_can_create_rating():array
    {
        $this->actingAs($this->user);
        $post = Post::first();
        $rating = Rating::factory()->make(['post_id'=> $post->id]);
        $response = $this->from('posts/'.$post->slug)->post('/vote/'.$post->id, $rating->toArray());
        $response->assertRedirect('posts/'.$post->slug);
        $data = ['post' => $post, 'rating' => $rating];
        return $data;
    }
    public function test_user_can_delete_rating(array $array)
    {
        $this->actingAs($this->user);
        $post = json_decode($array['post']);
        $rating =  json_decode($array['rating']);
        $response = $this->from('posts/'.$post->slug)->post('/vote/remove/'.$rating->id, $rating->toArray());
        $response->assertRedirect('posts/'.$this->post->slug);
    }
}
