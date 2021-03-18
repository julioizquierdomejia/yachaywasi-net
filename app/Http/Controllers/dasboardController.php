<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\DegreeLevelUser;
use App\Models\DegreeLevelCourse;
use App\Models\Subject;

class dasboardController extends Controller
{
    public function old_index(Request $request)
    {
        $todos = User::all();
    	//enviamos lso docentes del colegio logeado
    	$id = \Auth::user()->id;
    	$userAuth = User::findOrFail((int) $id);
    	$docentes = $todos = User::where('parent_id', $id)
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->where('role_id', 3)->get();

        $alumnos = $todos = User::where('parent_id', $id)
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->where('role_id', 4)->get();
        $role = \Auth::user()->roles->first()->name;

        //total de temas publicados
        $temas_total = Subject::all();

        //$cursos = Course::all();//$userAuth->courses;
        if ($role == 'lector') {
            $levelDegrees = DegreeLevelUser::where('user_id',$id)->get();
            if ($levelDegrees->count()) {
                $level = $levelDegrees->first()->level->id;
                $degree = $levelDegrees->first()->degree->id;
            } else {
                $level = 0;
                $degree = 0;
            }

            $teachers = \DB::table('degree_level_users')
                        ->join('role_user', 'role_user.user_id', 'degree_level_users.user_id')
                        ->select('degree_level_users.*', 'role_user.role_id')
                        //->groupBy('degree_level_users.user_id')
                        ->distinct('degree_level_users.user_id')
                        ->where('role_user.role_id',3)
                        ->where('degree_level_users.level_id', $level)
                        ->where('degree_level_users.degree_id', $degree)
                        ->get();

            /*$teachers = \DB::table('degree_level_users')
                        ->join('role_user', 'role_user.user_id', 'degree_level_users.user_id')
                        ->select(\DB::raw('count(*) user_count, degree_level_users.*, role_user.role_id'))
                        ->groupBy('degree_level_users.user_id')
                        ->where('role_user.role_id',3)
                        ->where('degree_level_users.level_id', $level)
                        ->where('degree_level_users.degree_id', $degree)
                        ->get();
            */
            $cursos = [];


                        //dd($teachers->toArray());
            foreach ($teachers as $teacher) {
                //$cursos = Course::join('degree_level_courses','degree_level_courses.course_id','courses.id')->select('degree_level_courses.*', 'courses.name as course_name', 'courses.user_id');
                $cursos[] = \DB::table('degree_level_courses')
                        ->join('courses', 'courses.id', 'degree_level_courses.course_id')
                        ->select('courses.id', 'courses.name as course_name', 'degree_level_courses.id as degree_level_course_id', 'degree_level_courses.id as dlc_id', 'courses.images as course_images')
                        ->where('degree_level_courses.degree_level_id', $teacher->id)
                        ->get()->toArray();
            }
        } else {
            $cursos = Course::where('user_id', $id)->get();
        }
        
        $degreeLevelUser = DegreeLevelUser::where('user_id',$id)->get();

        //Page title
        $title = 'Mis Cursos';

    	//llamamos a todos los docentes relacionados con este colegio
    	return view('admin.dashboard', compact('docentes', 'cursos','degreeLevelUser', 'alumnos', 'userAuth', 'temas_total', 'title'));

    }

    public function index(Request $request)
    {
        //Page title
        $title = 'Dashboard';
        //enviamos lso docentes del colegio logeado
        $userAuth = auth()->user();
        $role = \Auth::user()->roles->first()->name;

        //llamamos a todos los docentes relacionados con este colegio
        $docentes = User::where('parent_id', $userAuth->id)
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->where('role_id', 3)->get();

        $alumnos = User::where('parent_id', $userAuth->id)
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->where('role_id', 4)->get();

        //total de temas publicados
        $temas_total = Subject::all();

        if ($role == 'lector') {
            $user_degree = $userAuth->degrees->first();

            $degree_teachers = User::
                        join('degree_level_users', 'degree_level_users.user_id', '=', 'users.id')
                        ->join('role_user', 'role_user.user_id', '=', 'degree_level_users.user_id')
                        ->where('degree_level_users.degree_id', $user_degree->id)
                        ->where('role_id', 3) //rol docente
                        ->select(
                            'degree_level_users.id as dlu_id',
                            'users.id as user_id', 'users.title', 'users.name', 'users.url_zoom',
                            'users.id_zoom', 'users.clave_zoom', 'users.avatar',
                            'users.avatar', 'users.clave_zoom', 'users.avatar',
                        )
                        ->get();

                        //dd($degree_teachers->toArray());
            $teacher_ids = array_column($degree_teachers->toArray(), 'dlu_id');
            
            $cursos = DegreeLevelCourse::whereIn('degree_level_id', $teacher_ids)
                            ->join('courses', 'courses.id', '=', 'degree_level_courses.course_id')
                            ->select('degree_level_courses.id as dlc_id', 'degree_level_courses.degree_level_id', 'courses.id as course_id', 'courses.name as course_name', 'courses.descripcion', 'courses.abreviatura', 'courses.bg_color', 'courses.color', 'courses.images')
                            ->get();

                            
            //dd($cursos->toArray());
        } else {
            $cursos = Course::where('user_id', $userAuth->id)->get();
        }
        
        $degreeLevelUser = DegreeLevelUser::where('user_id', $userAuth->id)->get();

        return view('admin.dashboard', compact('role', 'docentes', 'cursos','degreeLevelUser', 'alumnos', 'userAuth', 'temas_total', 'title'));
    }
}
