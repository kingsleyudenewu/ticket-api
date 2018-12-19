<?php

use Illuminate\Database\Seeder;

class TicketTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\TicketType::class, 10)->create();
    }
}
