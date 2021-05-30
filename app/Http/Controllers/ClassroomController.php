<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Models\User;
use App\Models\Course;
use App\Models\DegreeLevelUser;
use App\Models\DegreeLevelCourse;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $id_user = User::findorfail(\Auth::user()->id);
        $aulas = $id_user->degrees;
        //degrees

        return view('classroom.index', compact('aulas'));
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
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function showAsistencia($classroom)
    {
        //
        
        $alumnos = DB::table('users')
                    ->join('role_user', 'users.id', 'role_user.user_id')
                    ->where('role_id', '=', 4)
                    ->join('degree_level_users','users.id', 'degree_level_users.user_id')
                    ->where('degree_id', '=', $classroom)
                    ->orderBy('name', 'asc')
                    ->get();

        return view('classroom.showasistencia', compact('alumnos'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        //
    }
}
