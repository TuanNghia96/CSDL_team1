<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->randomElement(Customer::pluck('id')),
        'memo' => $faker->realText(50),
        'total' => $faker->numberBetween(50000, 1000000),
        'status' => $faker->randomElement([0, 1]),
        'created_at' => Carbon::now()
    ];
});
