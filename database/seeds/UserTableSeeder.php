<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Course;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //colocamos en variables roles para poder relacionarlos
        $role_superadmin = Role::where('name', 'superadmin')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_edit = Role::where('name', 'editor')->first();
        $role_lector = Role::where('name', 'lector')->first();

        //colocamos en variables cursos para poder relacionarlos
        //$course_mate = Course::where('name', 'Matemática')->first();
        //$course_razmate = Course::where('name', 'Razonamiento Matemático')->first();

        $user = new User();
        $user->name = 'Julio Izquierdo Mejia';
        $user->email = 'julio.izquierdo.mejia@gmail.com';
        $user->password = bcrypt('M4r14Jul14123456');
        $user->status = 1;

        $user->save();
        //vamos a relacionar roles con usuarios
        $user->roles()->attach($role_superadmin);

        $user = new User();
        $user->name = 'Colegio Lev S. Vigotsky';
        $user->email = 'colegio.iep.levsvygotsky@gmail.com';
        //$user->password = bcrypt('szt5qqcz');
        $user->password = bcrypt('12345678');
        $user->parent_id = 1;
        $user->status = 1;
        $user->slug = 'vigotsky';
        $user->school = 'Lev S. Vigotsky';
        $user->phone = '946 350 910';
        
        $user->save();
        //vamos a relacionar roles con usuarios
        $user->roles()->attach($role_admin);
        //$user->courses()->attach($course_mate);
        //$user->courses()->attach($course_razmate);

        /*
        $user = new User();
        $user->name = 'Alejandra Cruz';
        $user->email = 'alejandra@gmail.com';
        $user->password = bcrypt('12345678');
        $user->parent_id = 2;
        $user->save();
        //vamos a relacionar roles con usuarios
        $user->roles()->attach($role_edit);

        $user = new User();
        $user->name = 'Marilyn Miss inicial';
        $user->email = 'marilyn@gmail.com';
        $user->password = bcrypt('12345678');
        $user->parent_id = 2;
        $user->save();
        //vamos a relacionar roles con usuarios
        $user->roles()->attach($role_edit);
        */
    }
}
