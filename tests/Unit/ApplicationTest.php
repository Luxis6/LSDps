<?php

namespace Tests\Unit;

use App\Models\Application;
use App\Models\Business_Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make([
            'type' => 1,
        ]);
    }
    public function test_user_can_see_all_applications()
    {
        $this->actingAs($this->user);
        $response = $this->get('business_posts_applications');
        $response->assertStatus(200);
    }
    public function test_user_can_view_create()
    {
        $this->actingAs($this->user);
        $business_post = Business_Post::first();
        $response = $this->get('application/'.$business_post->slug);
        $response->assertStatus(200);
    }
    public function test_user_can_create_application()
    {
        $this->actingAs($this->user);
        $business_post = Business_Post::first();
        //$application = Application::factory()->make();
       // $application->business_post_id = $business_post->id;

        //$cv = UploadedFile::fake()->create('cv.pdf');

        $application = Application::factory()->make(['business_post_id' => $business_post->id]);
        $response = $this->post(route('applications.store', ['id' => $business_post->slug]), $application->toArray());
        $response->assertRedirect(route('business_home'));
    }
}
