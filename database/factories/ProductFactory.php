<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    //get all of the admin user's id
    $users = \App\User::whereHas('roles', function ($q){
        $q->where('name','admin');
    })->get()->pluck('id');
    $idArray = $users->all();
    $item = array_rand($idArray);

    //let's create product
    return [
        'name'=>$faker->company,
        'description'=>$faker->paragraph,
        'user_id'=>$idArray[$item]
    ];
});
