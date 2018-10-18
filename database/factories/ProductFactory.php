<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'	=> $faker->name,
        'price'	=> 190000,
        'stock'	=> 20
    ];
});
