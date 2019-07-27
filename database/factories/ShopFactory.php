<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {

    //get all of the user's id
    $users = \App\User::get()->pluck('id');
    $idArray = $users->all();
    $item = array_rand($idArray);

    //create shops
    return array(
        'name'=>$faker->company,
        'location'=>$faker->address,
        'description'=>$faker->paragraph,
        'user_id'=>$idArray[$item]
    );
});
