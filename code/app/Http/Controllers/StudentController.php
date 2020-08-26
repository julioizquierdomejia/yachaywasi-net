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
        $docentes = $userAuth->docentes;
        $colegios = $userAuth->director;
        $cursos = $userAuth->courses;
        $todos = User::all();

        //listamos todos los grados de nivel Inicial
        $grados_inicial = Degree::where('level_id','=', 1)->get();

        //listamos todos los grados de nivel Primaria
        $grados_primaria = Degree::where('level_id','=', 2)->get();


        return view('admin.student.index',compact('docentes', 'userAuth', 'cursos', 'niveles', 'grados', 'grados_inicial', 'grados_primaria'));
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
    public function show($id)
    {
        //
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
