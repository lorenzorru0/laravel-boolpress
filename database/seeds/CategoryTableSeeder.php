<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['html', 'css', 'bootstrap', 'js', 'vuejs', 'nosql', 'php', 'laravel'];
        
        for ( $i = 0; $i < count($categories); $i++) {
            $newCategory = new Category();
            $newCategory['name'] = $categories[$i];
            $newCategory['slug'] = Str::of($newCategory['name'])->slug('-');
            $newCategory->save();
        }
    }
}
