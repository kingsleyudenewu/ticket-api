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
        factory(\App\Ticket::class, 10)->create()->each(function ($u) use ($ticket_type){
            $u->ticket_types()->saveMany($ticket_type);
        });
    }
}
