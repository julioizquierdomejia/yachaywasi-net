<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Course;
use App\Models\Level;
use App\Models\Degree;
use App\Models\DegreeLevelUser;
use App\Models\DegreeLevelCourse;
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
		//$docentes = $userAuth->docentes;
		$docentes = $todos = User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id', 3)->get();
		$alumnos = $todos = User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id', 4)->get();
		$roles = $userAuth->roles;
		$colegios = $userAuth->director;
		$cursos = $userAuth->courses;
		$todos = User::all();
		//listamos todos los grados de nivel Inicial
		$grados_inicial = Degree::where('level_id','=', 1)->get();
		//listamos todos los grados de nivel Primaria
		$grados_primaria = Degree::where('level_id','=', 2)->get();

		//var_dump($userAuth);
		//dd($userAuth->docentes::where('user_id','=', 3)->toArray());
		//dd($users = User::where('role_id', 4));
		//$users = User::get();
		//dd($users->roles());
		
		switch ($roleCurrent) {
			case "superadmin":
				$users = User::orderBy('id', 'asc')->get();
				//return view('admin.users.index',compact('users'));
				//return view('admin.dashboard',compact('users', 'todos'));
				break;
			case "admin":
				//return $userAuth;
				return view('admin.users.index',compact('docentes', 'alumnos', 'roles', 'userAuth', 'cursos', 'niveles', 'grados', 'grados_inicial', 'grados_primaria'));
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
				$saveOnGCS = env('SAVE_FILES_ON_GCS', false);
				//guardamos el archivo en uan variable
				$file = $request->file('avatar');
				//le creamos un nombre unico al archivo a subir y lo guardamos en otra variable
				$name = time().'_'.$file->getClientOriginalName();
				//creamos la ruta
				//ahora para subirlo a nuestra aplicacion hay que moverlo
				//a nuestra carpeta publica public_path()
				//$file->move(public_path().'/images/avatar/', $name);
				if ($saveOnGCS) {
					$disk = \Storage::disk('gcs');
					$gcsfile = interventionGCSImage($file, null, null, true);
					$disk->put('images/avatar/'.$name, (string) $gcsfile->encode());
				} else {
					if (DIRECTORY_SEPARATOR === '/') {
						$dir = env('FILES_PATH') ? env('FILES_PATH').'/images/avatar' : public_path('/images/avatar');
						// unix, linux, mac
						if (!is_dir($dir)) {
							mkdir($dir, 0777, true);
						}
						$file->move($dir, $name);
					} else {
						$file->move(public_path('images/avatar'), $name);
					}
				}
		}else{
			$name = null;
		}
		//creamos una variable que es un objeto de nuesta instancia de nuestro modelo
		$users = new User();
		//luego empezmaos a pasarle la info de los campos que vienen por medio de $request
		$password = bcrypt($request->input('password'));
		
		$users->title = $request->input('title');
		$users->name = $request->input('name');
		$users->email = $request->input('email');
		$users->password = $password;
		$users->classroom = $request->input('classroom');
		$users->slug = $request->input('slug');
		$users->url_zoom = $request->input('url_zoom');
		$users->id_zoom = $request->input('id_zoom');
		$users->clave_zoom = $request->input('clave_zoom');
		$users->avatar = $name;
		$users->parent_id = $request->input('parent_id');
		$users->status = 1;
		$users->save();
		//Obtener variable que asocia los grados con los niveles seleccionados
		$levelGrades = $request->grades;
		if($levelGrades){
			foreach ($levelGrades as $levelGrade) {
				$levelGradeExplode =  explode('_', $levelGrade) ;
				DegreeLevelUser::create([
					'user_id'=>$users->id,
					'level_id'=>$levelGradeExplode[0],
					'degree_id'=>$levelGradeExplode[1]
				]);
			}
		}
		
		//buscamos el ID del role al que queremos relacionar por medio del nombre del rol
		$role_current = Role::where('name', $request->input('role_id'))->first();
		
		//atachamos a user el Role por medio del ID
		$users->roles()->attach($role_current);
		//retornamos a la vista User segun la creacion de docente  estudiante
		if ($request->input('role_id') == 'lector') {
				return redirect('/student');
		}else{
			return redirect('/user');
		}
		
	}
	/**
	* Display the specified resource.
	*
	* @param  \App\Models\User  $user
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
	* @param  \App\Models\User  $user
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
	* @param  \App\Models\User  $user
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, User $user)
	{
		$saveOnGCS = env('SAVE_FILES_ON_GCS', false);

		if($request->role_id == 'lector'){
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
				//$file->move(public_path().'/images/avatar/', $name);
				if ($saveOnGCS) {
					$disk = \Storage::disk('gcs');
					$gcsfile = interventionGCSImage($file, null, null, true);
					$disk->put('images/avatar/'.$name, (string) $gcsfile->encode());
				} else {
					if (DIRECTORY_SEPARATOR === '/') {
						$dir = env('FILES_PATH') ? env('FILES_PATH').'/images/avatar' : public_path('/images/avatar');
						// unix, linux, mac
						if (!is_dir($dir)) {
							mkdir($dir, 0777, true);
						}
						$file->move($dir, $name);
					} else {
							$file->move(public_path('images/avatar'), $name);
					}
				}
			}
			$levelGrades = $request->grades;
			$degreeLevelUsers = DegreeLevelUser::where('user_id',$user->id)->get();
			foreach($degreeLevelUsers as $degreeLevelUser){
				DegreeLevelUser::destroy($degreeLevelUser->id);
			}
			if($levelGrades){
				foreach ($levelGrades as $levelGrade) {
					$levelGradeExplode =  explode('_', $levelGrade);
					DegreeLevelUser::create([
						'user_id'=>$user->id,
						'level_id'=>$levelGradeExplode[0],
						'degree_id'=>$levelGradeExplode[1]
					]);
				}
			}
			$user->save();
			//y retornamos una vista
			$users = User::orderBy('id', 'asc')->get();
			return redirect('/student');
		}else{
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
				//$file->move(public_path().'/images/avatar/', $name);
				if ($saveOnGCS) {
					$disk = \Storage::disk('gcs');
					$gcsfile = interventionGCSImage($file, null, null, true);
					$disk->put('images/avatar/'.$name, (string) $gcsfile->encode());
				} else {
					if (DIRECTORY_SEPARATOR === '/') {
						$dir = env('FILES_PATH') ? env('FILES_PATH').'/images/avatar' : public_path('/images/avatar');
						// unix, linux, mac
						if (!is_dir($dir)) {
							mkdir($dir, 0777, true);
						}
						$file->move($dir, $name);
					} else {
							$file->move(public_path('images/avatar'), $name);
					}
				}
			}
			$levelGrades = $request->grades;
			if($levelGrades){
				foreach ($levelGrades as $levelGrade) {
					$levelGradeExplode =  explode('_', $levelGrade) ;
					DegreeLevelUser::create([
						'user_id'=>$users->id,
						'level_id'=>$levelGradeExplode[0],
						'degree_id'=>$levelGradeExplode[1]
					]);
				}
			}
			//luego grabamos todo lo rellenado
			//$user->save();
			// Asociar Usuario -Nivel - Grado con cursos
			$courses = $request->courses;
			$coursesFound = [];
			$coursesNotFound = [];
			$userLevelDegrees = DegreeLevelUser::where('user_id',$user->id)->get();
			if($courses){
				foreach ($courses as $course) {
				$degreeLevelCourseExplode = explode('_', $course);
				$degreeLevelCourse =  DegreeLevelCourse::where([
					'degree_level_id' =>$degreeLevelCourseExplode[0],
					'course_id'=>$degreeLevelCourseExplode[1]
				])->first();
				if(!$degreeLevelCourse){
					$degreeLevelCourse = DegreeLevelCourse::create([
						'degree_level_id' =>$degreeLevelCourseExplode[0],
						'course_id'=>$degreeLevelCourseExplode[1]
					]);
				}
				$coursesFound[][$degreeLevelCourse->degree_level_id] = $degreeLevelCourse->course_id;
				}
			}
			// Eliminar cusros asociados a nivel y grado del usuario, si es que en un primer momento se le asignó cursos y ahora han disminuido
			if(count($courses) == 0){
				foreach ($userLevelDegrees as $userLevelDegree) {
				DegreeLevelCourse::where('degree_level_id',$userLevelDegree->id)->delete();
				}
			}
			if(count($userLevelDegrees) > 0){
				foreach ($userLevelDegrees as $userLevelDegree) {
				$degreeLevelCourses = DegreeLevelCourse::where('degree_level_id',$userLevelDegree->id)->get();
				foreach ($degreeLevelCourses as $degreeLevelCourse) {
					$isFound = false;
					foreach ($coursesFound as $course) {
						if(key($course) == $degreeLevelCourse->degree_level_id && $course[key($course)] == $degreeLevelCourse->course_id){
						$isFound = true;
						}
					}
					if(!$isFound){
						$coursesNotFound[][$degreeLevelCourse->degree_level_id] = $degreeLevelCourse->course_id;
					}
				}
				}
				if(count($coursesNotFound) > 0 ){
				foreach ($coursesNotFound as $course) {
					DegreeLevelCourse::where(['degree_level_id'=>key($course),'course_id'=>$course[key($course)]])->delete();
				}
				}
			}
			//y retornamos una vista
			$users = User::orderBy('id', 'asc')->get();
			//return view('admin.users.index', ['$users' => $users]);
			return redirect('/user')->with('status','El Registro se actualizo correctamente');
		}
	}
	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\Models\User  $user
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