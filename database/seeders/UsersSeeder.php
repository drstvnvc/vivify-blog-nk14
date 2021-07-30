<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->has(Post::factory(5)->published())->hasComments(10)->create();
        User::factory(10)->hasPosts(5, ['is_published' => true])->hasComments(10)->create();
    }
}
