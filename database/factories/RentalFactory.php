<?php

use App\Rental;
use App\Stock;
use App\User;
use Faker\Generator as Faker;

$factory->define(Rental::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->randomElement(App\User::pluck('id')),
        'stock_id'=>$faker->randomElement(App\Stock::pluck('id')),
        'date_out'=>$faker->date(),
        'date_in'=>$faker->date(),
    ];
});
