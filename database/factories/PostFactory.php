<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $thumb = fake()->image('public/images/posts', 640,480);
        $title = fake()->sentence(3);
        return [
            'title'     => $title,
            'slug'      => Str::slug($title),
            'user_id'   => User::pluck('id')->random(),
            'content'   => fake()->paragraph(),
            'thumb'     => str_replace('public', '', $thumb),
        ];
    }
}
