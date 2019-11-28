<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
    'email' => $faker->unique()->safeEmail,
    'name' => $faker->name,
    'role' => array_rand(Admin::$role),
    'password' => \Hash::make('123456'),
    'created_at' => Carbon::now()
    ];
});
