<?php

namespace Database\Seeders;

use App\Models\Registration;
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

//        Because of foreign keys this can't be used
//        Registration::truncate();
//        User::truncate();
//        Post::truncate();
//        Category::truncate();

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
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin1234'),
            'type' => 2
        ]);

        Category::factory(3)->create();

        Registration::factory()->create();

        Post::factory(5)->create([
            'registration_id' => 1,
            'submit_date' => now(),
            'fileName' => 'test.pdf',
            'arquivo' => 'arquivos/oIbyDAEf8jhKHevSSEaKHsRtBSUAlMKvHL3gU4D3.jpg'
        ]);
    }
}
