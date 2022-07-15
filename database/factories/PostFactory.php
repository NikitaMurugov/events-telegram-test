<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'name' => fake()->title(),
            'body' => fake()->paragraph(),
            'user_id' => rand(1,15),
            'active' => rand(0,1),
            'secret_key' => base64_encode(md5(uniqid())),
        ];
    }
}
