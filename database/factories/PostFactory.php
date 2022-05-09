<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'slug' => Str::slug($this->faker->name, '-'),
            'content' => 'Siuloma pagalba IT srityje',
            'category' => 1,
            'price' => 5,
            'img' => UploadedFile::fake()->create('image.png')
        ];
    }
}
