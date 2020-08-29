<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos roles para meterlos a la tabla
        $course = new Course();
        $course->name = 'Matemática';
        $course->descripcion = 'Curso de Álgebra para todos los grados';
        $course->abreviatura = 'Mat';
        $course->user_id= 2;
        $course->save();

        $course = new Course();
        $course->name = 'Razonamiento Matemático';
        $course->descripcion = 'Curso de Razonamiento Matemático';
        $course->abreviatura = 'Raz-Mat';
        $course->user_id= 2;
        $course->save();
    }
}
