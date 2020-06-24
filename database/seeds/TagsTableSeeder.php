<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'id' => 1,
                'name' => 'PHP',
            ],
            [
                'id' => 2,
                'name' => 'Ruby',
            ],
            [
                'id' => 3,
                'name' => 'Python',
            ],
            [
                'id' => 4,
                'name' => 'Java',
            ],
            [
                'id' => 5,
                'name' => 'Laravel',
            ],
            [
                'id' => 6,
                'name' => 'Rails',
            ],
            [
                'id' => 7,
                'name' => 'Django',
            ]
        ]);
    }
}
