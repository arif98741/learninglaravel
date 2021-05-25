<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(Category::class, 5)->create();
        factory(Blog::class, 5)->create();
    }
}
