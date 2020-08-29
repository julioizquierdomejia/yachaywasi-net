<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Role;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $request->user()->authorizeRoles(['superadmin','admin']);

        $id = \Auth::user()->id;
        $userAuth = User::findOrFail((int) $id);
        $cursos = Course::where('user_id',$userAuth->id)->get();

        return view('admin.course.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['superadmin','admin']);
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();

        //preguntamos si el requesta contienen algun archivo
        if ($request->hasFile('images')) {

            //guardamos el archivo en uan variable
            $file = $request->file('images');
            //le creamos un nombre unico al archivo a subir y lo guardamos en otra variable
            $name = time().'_'.$file->getClientOriginalName();
            //ahora para subirlo a nuestra aplicacion hay que moverlo 
            //a nuestra carpeta publica public_path()
            $file->move(public_path().'/images/course/', $name);
        }else{
            $name = null;
        }

        //luego empezmaos a pasarle la info de los campos que vienen por medio de $request
        $course->name = $request->input('name');
        $course->descripcion = $request->input('descripcion');
        $course->abreviatura = $request->input('abreviatura');
        $course->images = $name;
        $id_user = \Auth::user()->id;
        $course->user_id = $id_user;

        $course->save();

        return redirect('/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

        $competencias = $course->competencie;
        return view('admin.course.show', compact('course', 'competencias'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $curso = $course;
        return view('admin.course.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        
        $course->delete();
        return redirect('/course');
    }
}
