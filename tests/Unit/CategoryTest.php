<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\User;
use DB;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected Category $category;
    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make([
            'type' => 2,
        ]);
    }

    public function test_admin_can_see_all_categories()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('categories'));
        $response->assertStatus(200);
    }
    public function test_user_can_see_sub_categories()
    {
        $user = User::factory()->make();
        $this->actingAs($user);
        $category = Category::where('parent_id', null)->first();
        $response = $this->get('/categories/'.$category->slug);
        $response->assertStatus(200);
    }
    public function test_user_cant_see_sub_categories_sub_category_given_as_main()
    {
        $user = User::factory()->make();
        $this->actingAs($user);
        $id = rand(1,6);
        $category = Category::where('parent_id', $id)->first();
        $response = $this->get('/categories/'.$category->slug);
        $response->assertStatus(404);
    }
    public function test_admin_can_create_category():Category
    {
        $this->actingAs($this->user);
        $category = Category::factory()->make();
        $response = $this->post('categories/create', $category->toArray());
        $response->assertRedirect(route('categories'));
        return $category;
    }
    /**
     * @depends test_admin_can_create_category
     */
    public function test_admin_can_update_category(Category $category)
    {
        $this->actingAs($this->user);
        $category = json_decode($category);
        $category = Category::where('name', $category->name)->first();
        $response = $this->patch('/categories/update/'.$category->id,
            [
                'name' => 'new name',
                'slug' => 'new-name',
            ]);
        $response->assertRedirect(route('categories'));
    }
    /**
     * @depends test_admin_can_create_category
     */
    public function test_admin_can_delete_category()
    {
        $this->actingAs($this->user);
        $category = Category::where('name', 'new name')->first();
        $response = $this->delete('/categories/delete/'.$category->id);
        $response->assertRedirect(route('categories'));
    }

}
