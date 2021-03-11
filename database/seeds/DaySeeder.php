<?php

use Illuminate\Database\Seeder;
use App\Day;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dia = new Day();
        $dia->name = 'Lunes';
        $dia->status = 1;
        $dia->save();

        $dia = new Day();
        $dia->name = 'Martes';
        $dia->status = 1;
        $dia->save();

        $dia = new Day();
        $dia->name = 'Miércoles';
        $dia->status = 1;
        $dia->save();

        $dia = new Day();
        $dia->name = 'Jueves';
        $dia->status = 1;
        $dia->save();

        $dia = new Day();
        $dia->name = 'Viernes';
        $dia->status = 1;
        $dia->save();
    }
}
