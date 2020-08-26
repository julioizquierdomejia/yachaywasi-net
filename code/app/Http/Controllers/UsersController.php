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

class UsersController extends Controller
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
 

        
        switch ($roleCurrent) {
          case "superadmin":
            $users = User::orderBy('id', 'asc')->get();
            //return view('admin.users.index',compact('users'));
            //return view('admin.dashboard',compact('users', 'todos'));
            break;
          case "admin":
            //return $userAuth;
            return view('admin.users.index',compact('docentes', 'userAuth', 'cursos', 'niveles', 'grados', 'grados_inicial', 'grados_primaria'));
            break;
          case "editor":
            return view('admin.dashboard',compact('usreCurrent'));
            break;
          case "lector":
            return view('admin.dashboard',compact('usreCurrent'));
            break;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // vamos a modificar el requesta para que primero pase por nuestro StoreUserRequest
    //public function store(Request $request)
    public function store(StoreUserRequest $request) //StoreUserRequest
    {   

        //para obtener todos los datos que esta enviando el usuario por el fomrulario
        //return $request->all();

        //para obtener solo un dato que el usuario esta enviando por el fomrulario 

        //return $request->input('role_id');
        
        //VALIDACIONES
        //creamos una variable para las validaciones
        //y le pasamos un array de validaciones al Reuqest por medio del metodo validate->
        //esto ya no lo usamos por que lo hemos pasado a un request
        // a este StoreUserRequest
        //y lo mehor creado como php artisan make:request StoreUserRequest

        //preguntamos si el requesta contienen algun archivo
        if ($request->hasFile('avatar')) {

            //guardamos el archivo en uan variable
            $file = $request->file('avatar');
            //le creamos un nombre unico al archivo a subir y lo guardamos en otra variable
            $name = time().'_'.$file->getClientOriginalName();
            //creamos la ruta
            //ahora para subirlo a nuestra aplicacion hay que moverlo 
            //a nuestra carpeta publica public_path()
            $file->move(public_path().'/images/avatar/', $name);
        }else{
            $name = null;
        }

        //creamos una variable que es un objeto de nuesta instancia de nuestro modelo
        $users = new User();
        //luego empezmaos a pasarle la info de los campos que vienen por medio de $request
        $password = bcrypt($request->input('password'));
        
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $password;
        $users->classroom = $request->input('classroom');
        $users->avatar = $name;
        $users->parent_id = $request->input('parent_id');
        $users->status = 0; 
        
        //$users->save();

        //Obtener variable que asocia los grados con los niveles seleccionados
        $levelGrades = $request->grades;

        foreach ($levelGrades as $levelGrade) {
            $levelGradeExplode =  explode('_', $levelGrade) ;
            DegreeLevelUser::create([
              'user_id'=>$users->id,
              'level_id'=>$levelGradeExplode[0],
              'degree_id'=>$levelGradeExplode[1]
            ]);
        }
        
        //buscamos el ID del role al que queremos relacionar por medio del nombre del rol
        $role_current = Role::where('name', $request->input('role_id'))->first();
        
        //atachamos a user el Role por medio del ID
        $users->roles()->attach($role_current);

        //retornamos a la vista User segun la creacion de docente  estudiante

        return redirect('/user');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    { 

        $cursos = Course::all();
        $levelDegrees = DegreeLevelUser::where('user_id',$user->id)->get();

        return view('admin.users.show', compact('user', 'cursos','levelDegrees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) //implicin biding trae el ID y tambien el modelo de eloquen
    {

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {


        //lo primero que debemos hacer es
        //rellenar los campos con todo lo que viene del formulario
        //menos el avatar

        $user->fill($request->except('avatar'));

        if ($request->hasFile('avatar')) {

            $current_avatar = public_path().'/images/avatar/'.$user->avatar;
            if (@getimagesize($current_avatar)) {
                unlink($current_avatar);
            }
            
            //preguntamos si este usuario ya tiene una foto
            //en la carpeta public
            $current_avatar = public_path().'/images/avatar/'.$user->avatar;

            //guardamos el archivo en uan variable
            $file = $request->file('avatar');
            //le creamos un nombre unico al archivo a subir y lo guardamos en otra variable
            $name = time().'_'.$file->getClientOriginalName();
            //aqui le damos al campo avatar el nombre para que lo grabe
            $user->avatar = $name;
            //ahora para subirlo a nuestra aplicacion hay que moverlo 
            //a nuestra carpeta publica public_path()
            $file->move(public_path().'/images/avatar/', $name);
            
        }


        //luego grabamos todo lo rellenado
        $user->save();

        // Asociar Usuario -Nivel - Grado con cursos
        $courses = $request->courses;

        // Eliminar cusros asociados a nivel y grado del usuario
        $userLevelDegrees = DegreeLevelUser::where('user_id',$user->id)->get();

        foreach ($userLevelDegrees as $userLevelDegree) {
          DegreeLevelCourse::where('degree_level_id',$userLevelDegree->id)->delete();
        }

        if($courses){
          foreach ($courses as $course) {
            $degreeLevelCourseExplode = explode('_', $course);
            DegreeLevelCourse::create([
              'degree_level_id' =>$degreeLevelCourseExplode[0],
              'course_id'=>$degreeLevelCourseExplode[1]
            ]);
          }
        }

        //y retornamos una vista
        $users = User::orderBy('id', 'asc')->get();

        //return view('admin.users.index', ['$users' => $users]);
        return redirect('/user')->with('status','El Registro se actualizo correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //para aliminar archivos existentes
        //perimero guardamos en una variable la ruta
        $file_path = public_path().'/images/avatar/'.$user->avatar;
        \File::delete($file_path);
        
        $user->delete();
        return redirect('/user');
    }
}
