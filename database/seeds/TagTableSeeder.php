<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['frontend', 'backend', 'ux', 'design pattern', 'algoritmi', 'layout', 'function'];

        for ($i = 0; $i < count($tags); $i++) {
            $newTag = new Tag();
            $newTag['name'] = $tags[$i];
            $newTag['slug'] = Str::of($newTag['name'])->slug('-');
            $newTag->save();
        }
    }
}
