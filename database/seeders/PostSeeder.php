<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Sample Post',
            'content' => 'This is seeded content.',
        ]);

        Post::create([
            'title' => 'Sample Post 2',
            'content' => 'This is seeded content 2.',
        ]);
    }
}
