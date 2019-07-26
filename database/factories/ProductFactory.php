<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->company,
        'description'=>$faker->paragraph,
        'user_id'=>mt_rand(1,9)
    ];
});
