<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i =1; $i <= 50; $i++)
        {
            DB::table('posts')->insert([
                [
                    'id' => $i,
                    'title' => "テスト{$i}",
                    'text' => "テスト投稿{$i}",
                    'img_path' => '/storage/images/202006220541151.png',
                    'user_id' => mt_rand(1, 5),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
