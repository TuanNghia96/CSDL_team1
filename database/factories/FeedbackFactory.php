<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Feedback;
use App\Models\Product;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::pluck('id')),
        'product_id' => $faker->randomElement(Product::pluck('id')),
        'content' => $faker->realText(50),
        'created_at' => Carbon::now()
    ];
});
