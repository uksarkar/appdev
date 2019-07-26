<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return array(
        'name'=>$faker->company,
        'location'=>$faker->address,
        'description'=>$faker->paragraph,
        'user_id'=>mt_rand(1,9)
    );
});
