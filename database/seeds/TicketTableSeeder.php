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
        $ticket_type = \App\TicketType::pluck('id');
        factory(\App\Ticket::class, 10)->create()->each(function ($u){
            $u->ticket_types()->attach(\App\TicketType::all());
        });
    }
}
