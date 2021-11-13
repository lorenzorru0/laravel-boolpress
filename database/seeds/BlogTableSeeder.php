<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Blog;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for( $i = 0; $i < 20; $i++) {
            $newBlog = new Blog();
            $newBlog['title'] = $faker->sentence();
            $newBlog['slug'] = Str::of($newBlog['title'])->slug('-');
            $newBlog['username'] = $faker->userName();
            $newBlog['content'] = $faker->realTextBetween($minNbChars = 160, $maxNbChars = 500, $indexSize = 2);
            $newBlog->save();
        }
    }
}
