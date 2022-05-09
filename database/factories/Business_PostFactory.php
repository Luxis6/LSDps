<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Business_PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'random',
            'slug' => Str::slug($this->faker->name, '-'),
            'category' => 1,
            'job_content' => $this->faker->sentence(20),
            'job_requirements' => $this->faker->sentence(20),
            'job_offer' => $this->faker->sentence(20),
            'job_salary' => $this->faker->sentence(10),
            'job_type' => 3,
            'business_link' => $this->faker->url(),
            'city' => $this->faker->city,
        ];
    }
}
