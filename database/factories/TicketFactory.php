<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'code' => strtoupper(str_random(8)),
        'ticket_type_id' => factory(\App\TicketType::class)->create()->id
    ];
});
