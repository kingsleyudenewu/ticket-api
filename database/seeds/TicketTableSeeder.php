<?php

use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticket_type = \App\TicketType::all();
        factory(\App\Ticket::class, 5)->create()->each(function ($u) use ($ticket_type){
//            $u->ticket_types()->save(factory($ticket_type->random(1))->make());
            $u->ticket_types()->saveMany($ticket_type);
        });
    }
}
