<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Record;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(App\Record::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});