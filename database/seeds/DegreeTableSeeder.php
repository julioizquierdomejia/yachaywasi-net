<?php

use Illuminate\Database\Seeder;
use App\Degree;

class DegreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $degree = new Degree();
        $degree->name = '4 años';
        $degree->status = 1;
        $degree->level_id = 1;
        $degree->save();

        $degree = new Degree();
        $degree->name = '5 años';
        $degree->status = 1;
        $degree->level_id = 1;
        $degree->save();

        $degree = new Degree();
        $degree->name = '1er Grado';
        $degree->status = 1;
        $degree->level_id = 2;
        $degree->save();

        $degree = new Degree();
        $degree->name = '2do Grado';
        $degree->status = 1;
        $degree->level_id = 2;
        $degree->save();

        $degree = new Degree();
        $degree->name = '3er Grado';
        $degree->status = 1;
        $degree->level_id = 2;
        $degree->save();

        $degree = new Degree();
        $degree->name = '4to Grado';
        $degree->status = 1;
        $degree->level_id = 2;
        $degree->save();

        $degree = new Degree();
        $degree->name = '5to Grado';
        $degree->status = 1;
        $degree->level_id = 2;
        $degree->save();

        $degree = new Degree();
        $degree->name = '6to Grado';
        $degree->status = 1;
        $degree->level_id = 2;
        $degree->save();
    }
}
