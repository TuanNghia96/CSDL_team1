<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image_font' => $faker->imageUrl(),
        'image_back' => $faker->imageUrl(),
        'image_up' => $faker->imageUrl(),
        'sex' => $faker->randomElement([0, 1]),
        'price' => $faker->numberBetween(10000, 500000),
        'category_id' => $faker->randomElement(Category::pluck('id')),
        'high' => $faker->numberBetween(10, 50),
        'status' => $faker->randomElement([0, 1]),
        'created_at' => Carbon::now()
    ];
});
