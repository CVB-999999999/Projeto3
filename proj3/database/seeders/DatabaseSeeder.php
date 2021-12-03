<?php

namespace Database\Seeders;

use App\Models\Tutor;
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
        Tutor::truncate();

        $user = User::factory()->create([
            'name' => 'Paulo',
            'active' => false
        ]);

        $user = User::factory()->create([
            'email' => 'teste@example.com',
            'password' => bcrypt('teste1234'),
            'type' => 0
        ]);

        $user = User::factory()->create([
            'email' => 'tutor@example.com',
            'password' => bcrypt('tutor1234'),
            'type' => 1
        ]);

        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('admin1234'),
            'type' => 2
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        Post::factory(5)->create();
    }
}
