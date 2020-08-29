<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Course;
use App\Level;
use App\Degree;
use App\DegreeLevelUser;
use App\DegreeLevelCourse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest; //agregamos nuestro Request para poder usar

use Input;
use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $niveles = Level::all();
        $grados = Degree::all();

        $roleCurrent = $request->user()->roles()->first()->name;
        $usreCurrent = $request->user()->first();

        $id = \Auth::user()->id;
        $userAuth = User::findOrFail((int) $id);
        $docentes = User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id', 3)->get();
        $alumnos = User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id', 4)->select('users.*')->get();
        $colegios = $userAuth->director;
        $cursos = $userAuth->courses;
        $todos = User::all();

        //listamos todos los grados de nivel Inicial
        $grados_inicial = Degree::where('level_id','=', 1)->get();

        //listamos todos los grados de nivel Primaria
        $grados_primaria = Degree::where('level_id','=', 2)->get();


        return view('admin.student.index',compact('docentes', 'alumnos', 'userAuth', 'cursos', 'niveles', 'grados', 'grados_inicial', 'grados_primaria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $alumno = User::findOrFail((int) $user_id);
        /*$degree_level_users = User::where('users.id', $user_id)
                ->join('degree_level_users', 'degree_level_users.user_id','users.id')
                ->join('degrees', 'degrees.id','degree_level_users.degree_id')
                ->join('levels', 'levels.id','degree_level_users.level_id')
                ->select('users.*', 'degrees.name as degree_name', 'levels.name as level_name')
                ->get();
        if ($degree_level_users->count()) {
            $first = $degree_level_users->first();
            $grade = $first->level_name . ' / ' .$first->degree_name; 
        } else {
            $grade = "";
        }*/
        $alumnos = User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id', 4)->get();
        
        $levelDegrees = DegreeLevelUser::where('user_id',$user_id)->get();

        if ($levelDegrees->first()->count()) {
            $level = $levelDegrees->first()->level->name;
            $degree = $levelDegrees->first()->degree->name;
            $courses = Course::join('degree_level_courses','degree_level_courses.course_id','courses.id')->select('degree_level_courses.*', 'courses.name as course_name', 'courses.user_id')
            ->where('degree_level_courses.degree_level_id', $user_id)
            ->get();
        } else {
            $level = '';
            $degree = '';
            $courses = [];
        }
        /*$cursos = User::where('users.id', $user_id)
                    ->join('courses', 'courses.user_id','users.id')
                    ->get();*/

        return view('admin.student.show', compact('alumno', 'courses','levelDegrees', 'degree', 'level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
