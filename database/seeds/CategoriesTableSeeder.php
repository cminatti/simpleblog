<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
 
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        ['name' => 'Category 1', 'slug' => 'category-1'],
        ['name' => 'Category 2', 'slug' => 'category-2'],
        ['name' => 'Category 3', 'slug' => 'category-3']
        ]);
    }
}
