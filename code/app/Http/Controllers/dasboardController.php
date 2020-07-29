<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class dasboardController extends Controller
{
    public function index(Request $request)
    {	
    	//enviamos lso docentes del colegio logeado
    	
    	$id = \Auth::user()->id;
    	$userAuth = User::findOrFail((int) $id);
    	$docentes = $userAuth->docentes;
        $cursos = $userAuth->courses;

    	//llamamos a todos los docentes relacionados con este colegio
    	return view('admin.dashboard', compact('docentes', 'cursos'));

    }
}
