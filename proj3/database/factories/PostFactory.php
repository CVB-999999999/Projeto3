<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => md5($this->faker->slug),
            'body' => $this->faker->paragraph,
            'deleted' => false,
            'registration_id' => 1,
            'submit_date' => now(),
            'fileName' => 'test.pdf'
        ];
    }
}
