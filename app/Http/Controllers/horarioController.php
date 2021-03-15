<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Role;
use App\Degree;
use App\Level;
use App\Day;
use App\Hour;
use App\UserHoursAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class horarioController extends Controller
{
    //
    public function index(Request $request)
    {
        
        $id = \Auth::user()->id;
        $userAuth = User::findOrFail((int) $id);
        $cursos = Course::where('user_id',$userAuth->id)->get();
        $title = 'Horario';

        //IDS Nivel y grado
        $nivel_id = DB::table('degree_level_users')->where('user_id', $id)->value('level_id');
        $grado_id = DB::table('degree_level_users')->where('user_id', $id)->value('degree_id');
        
        //name nivel y grado
        $nivel = DB::table('levels')->where('id', $nivel_id)->value('name');
        $grado = DB::table('degrees')->where('id', $grado_id)->value('name');

        //Rol del usuario Maestro o alumno
        $rol_id = DB::table('role_user')->where('user_id', $id)->value('role_id');
        $rol = DB::table('roles')->where('id', $rol_id)->value('name');

        return view('admin.schedule.index', compact('nivel_id', 'grado_id', 'nivel', 'grado', 'rol_id', 'rol', 'title'));
    }
}
