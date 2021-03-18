<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use App\Models\Course;
use App\Models\Degree;
use Illuminate\Support\Facades\DB;
use Pivot;

class CrearCursoToUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   


        $cants = DB::table('course_degree_level_user')->where('user_id',3)->get();

        //$niveles = User::find($id)->levels;
        $grados = User::find($id)->degrees;
        //$cursos = User::find($id)->courses;
        
        /*
        foreach ($grados as $grado){
            echo $grado;
            echo "<br>";
        }
        */


       User::where('id', $id)
            ->whereHas('levels', function($q) {
                $q->where('id', 1);
            })
            ->get();

            return User;

        /*
        foreach ($niveles as $nivel) {
            echo '<h1><b>'.$nivel->name.'</b></h1>';

            foreach ($grados as $grado) {
                echo '--->>>'. '<b>' .$grado->name . '</b>';
                echo "<br>";

                foreach ($cursos as $curso) {
                    echo '------->>>'.$curso->name;
                    echo "<br>";
                }
            }

        }
        */

        
        exit;

        $user = User::find($id);
        $niveles_list = Level::all();
        $grados_list = Degree::all();
        $cursos_list = Course::all();

        //$user = $user->levels()->with('degrees', 'courses');
        $user = User::find($id);
        $niveles = $user->levels;
        $grados = $user->degrees;
        $cursos = $user->courses;

        //$result = Pivot::with('courses')->with('levels')->with('degrees')->with('users')->get();
        //$usuarios = DB::table('users')->where('name', 'Miss Anita Guevara')->first();
        $usuario = DB::table('users')->find(3);




        return view('admin.users.addcourse', compact('user', 'niveles_list', 'grados_list', 'cursos_list', 'niveles', 'grados', 'cursos', 'usuario'));
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
