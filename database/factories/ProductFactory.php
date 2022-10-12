<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'price' => $faker->randomFloat(2, 10, 10000),
        'description' => $faker->text(300),
        'active' => $faker->randomElement([true, false]),
        'user_id' => 1,
        'updated_at' => null
    ];
});
