<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\DegreeLevelUser;

class dasboardController extends Controller
{
    public function index(Request $request)
    {	


        $todos = User::all();
    	//enviamos lso docentes del colegio logeado
    	$id = \Auth::user()->id;
    	$userAuth = User::findOrFail((int) $id);
    	$docentes = $todos = User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id', 3)->get();
        $cursos = Course::all();//$userAuth->courses;
        $degreeLevelUser = DegreeLevelUser::where('user_id',$id)->get();

    	//llamamos a todos los docentes relacionados con este colegio
    	return view('admin.dashboard', compact('docentes', 'cursos','degreeLevelUser'));

    }
}
