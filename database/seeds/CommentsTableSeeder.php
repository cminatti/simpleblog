<?php

use Illuminate\Database\Seeder;
use App\Comment;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 30; $i++) {
            Comment::create([
               'name' => $faker->name(),
               'body' => $faker->text($maxNbChars = 100),
               'post_id' => rand(1,5),
           ]);
        }
    }
}
