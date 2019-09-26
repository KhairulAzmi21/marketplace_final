<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,10),
        'title'   => $faker->name,
        'body'    => $faker->sentence,
        'price'   => rand(400,1000),
        'category' => $faker->randomElement($array = array ('mobile','electronics','furniture', 'fashion')),
        'status'  => $faker->randomElement($array = array ('sold','reserved','available'))
    ];
});
