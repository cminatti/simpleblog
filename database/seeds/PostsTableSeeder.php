<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory as Faker;
 

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
         Post::create([
            'title' => 'First Post',
             'slug' => 'first-post',
            'body' => $faker->text($maxNbChars = 500),
             'created_at' => date("Y-m-d H:i:s", strtotime( '-5 days' ) ),
            'user_id' => 1,
        ]);
         Post::create([
            'title' => 'Second Post',
             'slug' => 'second-post',
            'body' => $faker->text($maxNbChars = 500),
             'created_at' => date("Y-m-d H:i:s", strtotime( '-4 days' ) ),
             'user_id' => 1,
        ]);
         Post::create([
            'title' => '3rd Post',
             'slug' => '3rd-post',
            'body' => $faker->text($maxNbChars = 500),
             'created_at' => date("Y-m-d H:i:s", strtotime( '-3 days' ) ),
             'user_id' => 1,
        ]);
         Post::create([
            'title' => '4th Post',
             'slug' => '4th-post',
            'body' => $faker->text($maxNbChars = 500),
             'created_at' => date("Y-m-d H:i:s", strtotime( '-2 days' ) ),
             'user_id' => 1,
        ]);
         Post::create([
            'title' => '5th Post',
             'slug' => '5th-post',
            'body' => $faker->text($maxNbChars = 500),
             'user_id' => 1,
        ]);
    }
}
