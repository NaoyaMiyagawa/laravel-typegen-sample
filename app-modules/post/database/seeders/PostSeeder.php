<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Post\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::get();

        foreach ($users as $user) {
            Post::factory()
                ->count(5)
                ->for($user)
                ->create();
        }
    }
}
