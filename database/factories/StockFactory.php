<?php

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'book_id'=>$faker->randomElement(App\Book::pluck('id')),
    ];
});
