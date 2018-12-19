<?php

use Faker\Generator as Faker;

$factory->define(App\TicketType::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName()
    ];
});
