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
            'id' => rand(41,62),
            'type' => 1,
        ]);
        $this->post = Post::factory()->make();
    }

    public function test_user_can_create_rating():array
    {
        $this->actingAs($this->user);
        $post = Post::first();
        $rating = Rating::factory()->make(['post_id'=> $post->id, 'user_id' => $this->user->id]);
        $response = $this->from('posts/'.$post->slug)->post('/vote/'.$post->id, $rating->toArray());
        $response->assertRedirect('posts/'.$post->slug);
        $data = ['post' => $post, 'rating' => $rating];
        return $data;
    }
    /**
     * @depends test_user_can_create_rating
     */
    public function test_user_can_delete_rating(array $array)
    {
        $this->actingAs($this->user);
        $post = json_decode($array['post']);
        $rating =  json_decode($array['rating']);
        $rating = Rating::where(['post_id'=> $rating->post_id,'user_id' => $rating->user_id])->first();
        $response = $this->from('posts/'.$post->slug)->get(route('vote.remove',['id' => $rating->id]), $rating->toArray());
        $response->assertStatus(200);
    }
}
