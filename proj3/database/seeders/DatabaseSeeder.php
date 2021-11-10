<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create([
            'name' => 'Paulo'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
        Post::factory(5)->create();
        //Post::factory(5)->create();
        /*$user = User::factory()->create();

        $mat = Category::create([
            'name' => 'Matemática',
            'slug' => 'mat'
        ]);

        $pt = Category::create([
            'name' => 'Português',
            'slug' => 'pt'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $mat->id,
            'title' => 'My First Post',
            'slug' => 'my-first-post',
            'excerpt' => 'first post',
            'body' => 'This is my first post'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $pt->id,
            'title' => 'My Second Post',
            'slug' => 'my-second-post',
            'excerpt' => 'second post',
            'body' => 'This is my second post'
        ]);
        */
    }
}
