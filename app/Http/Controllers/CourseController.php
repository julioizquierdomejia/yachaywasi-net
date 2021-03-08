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
        $title = 'Cursos';

        return view('admin.course.index', compact('cursos', 'title'));
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

        $title = 'Curso '. $course->name;
        
        return view('admin.course.show', compact('course', 'competencias', 'title'));

        
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
        $title = 'Editar ' . $course->name;
        return view('admin.course.edit', compact('curso', 'title'));
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
        $course->fill($request->except('images'));

        if ($request->hasFile('images')) {

            $current_images = public_path().'/images/course/'.$course->images;
            if (@getimagesize($current_images)) {
                unlink($current_images);
            }
            
            //preguntamos si este curso ya tiene una imagen
            //en la carpeta public
            $current_images = public_path().'/images/course/'.$course->images;

            //guardamos el archivo en uan variable
            $file = $request->file('images');
            //le creamos un nombre unico al archivo a subir y lo guardamos en otra variable
            $name = time().'_'.$file->getClientOriginalName();
            //aqui le damos al campo avatar el nombre para que lo grabe
            $course->images = $name;
            //ahora para subirlo a nuestra aplicacion hay que moverlo 
            //a nuestra carpeta publica public_path()
            $file->move(public_path().'/images/course/', $name);
        }

        //luego grabamos todo lo rellenado
        $course->save();

        //y retornamos una vista
        $course = Course::orderBy('id', 'asc')->get();

        //return view('admin.users.index', ['$users' => $users]);
        return redirect('/course')->with('status','El Registro se actualizo correctamente');
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
