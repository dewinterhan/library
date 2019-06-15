<?php

use Faker\Generator as Faker;
use App\Book;
use App\Author;

$factory->define(Book::class, function (Faker $faker) {

    $author = Author::pluck('id')->toArray();
    return [
        'title' => $faker->sentence(6),
        'author_id' => $faker->randomElement($author),
        'isbn' => $faker->isbn13,
        'copies'=> $faker->randomDigitNotNull,
        'release_year' => $faker->year,
        'description' => $faker->text(600),
    ];
});
