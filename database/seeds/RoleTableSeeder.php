<?php

use Illuminate\Database\Seeder;
//usamos el modelo que en este caso es Role
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos roles para meterlos a la tabla
        $role = new Role();
        $role->name = 'superadmin';
        $role->descripcion = 'Administrador principal de todo el sistema';
        $role->save();

        $role = new Role();
        $role->name = 'admin';
        $role->descripcion = 'Director Administrador del sistema del colegio';
        $role->save();

        $role = new Role();
        $role->name = 'editor';
        $role->descripcion = 'Docente editor de temas';
        $role->save();

        $role = new Role();
        $role->name = 'lector';
        $role->descripcion = 'Estudiante que puede ver los temas y mensajear con los docentes';
        $role->save();
    }
}
