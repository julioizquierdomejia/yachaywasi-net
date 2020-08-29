<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = new Level();
        $level->name = 'Inicial';
        $level->status = 1;
        $level->save();

        $level = new Level();
        $level->name = 'Primaria';
        $level->status = 1;
        $level->save();
    }
}
