<?php

use Illuminate\Database\Seeder;
use App\Hour;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $hora = new Hour();
        $hora->name = '8:00 - 8:40';
        $hora->status = 1;
        $hora->save();

        $hora = new Hour();
        $hora->name = '8:40 - 9:20';
        $hora->status = 1;
        $hora->save();

        $hora = new Hour();
        $hora->name = '9:20 - 10:00';
        $hora->status = 1;
        $hora->save();

        $hora = new Hour();
        $hora->name = '10:00 - 10:40';
        $hora->status = 1;
        $hora->save();

        $hora = new Hour();
        $hora->name = '10:40 - 11:20';
        $hora->status = 1;
        $hora->save();

        $hora = new Hour();
        $hora->name = '11:20 - 12:00';
        $hora->status = 1;
        $hora->save();
    }
}
