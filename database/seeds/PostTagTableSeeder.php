<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++)
        {
            $randInt = mt_rand(0, 7);
            if ($randInt === 0) {
                continue;
            }
            $post = Post::find($i);
            $tagIds = Tag::all()->random($randInt)->pluck('id')->toArray();
            $post->tags()->attach($tagIds);
        }
    }
}
