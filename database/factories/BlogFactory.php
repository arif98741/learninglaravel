<?php

/** @var Factory $factory */

use App\Models\Blog;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->text('60')),
        'category_id' => \App\Models\Category::all()->random(),
        'description' => $faker->text(100),
        'image' => $faker->text('10') . '.jpg',
        'added_by' => $faker->randomElement([1, 2, 3]),
        'updated_by' => $faker->randomElement([1, 2, 3]),
    ];
});
