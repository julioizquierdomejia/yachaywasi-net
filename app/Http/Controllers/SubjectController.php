<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\DegreeLevelCourse;
use App\DegreeLevelUser;
use App\Subject;
use App\Course;
use App\Http\Requests\SubjectRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class SubjectController extends Controller
{
    public function index($id)
    {

        $idUser = \Auth::user()->id;
        $userAuth = User::findOrFail((int) $idUser);

        $course = DegreeLevelCourse::find($id);
        $subjects = Subject::where('level_course_id',$id)->get();

        // Comentario de prueba

        return view('admin.subject.index')->with(compact('course','subjects', 'id', 'userAuth'));
    }

    public function store(SubjectRequest $request)
    {



        $urlVideoWatch = $request->input('link_youtube');
        $urlVideoEmbed = str_replace("watch?v=", "embed/", $urlVideoWatch);

    	$subject = new Subject();
        $subject->level_course_id = $request->input('level_course_id');
		$subject->bimester = $request->input('bimester');
		$subject->unit = $request->input('unit');
        $subject->position = $request->input('position');
        $subject->name = $request->input('name');
        $subject->date = $request->input('date');
        $subject->user_id = $request->input('user_id');
        $subject->school_id = $request->input('school_id');
        $subject->link_youtube = $urlVideoEmbed; //$request->input('link_youtube');
        $subject->file_drive = $request->input('file_drive');
        $subject->file_drive_second = $request->input('file_drive_second');
        
        if ($request->hasFile('file_drive')) {
            $file = $request->file('file_drive');
            $subject->file_drive = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/images/subject/', $subject->file_drive);
        }

        if ($request->hasFile('file_drive_second')) {
            $file = $request->file('file_drive_second');
            $subject->file_drive_second = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/images/subject/', $subject->file_drive_second);
        }

        $subject->save();

        return redirect()->route('subject', $request->input('level_course_id'));
    }

    public function show($course_id)
    {


        $course_data = DB::table('courses')
                        ->join('degree_level_courses', 'degree_level_courses.course_id', 'courses.id')
                        ->where('degree_level_courses.id', $course_id)
                        ->first();

        $idUser = \Auth::user()->id;
        $userAuth = User::findOrFail((int) $idUser);


        $temas = Subject::
                join('degree_level_courses', 'degree_level_courses.id', 'subjects.level_course_id')
                ->select('subjects.*','degree_level_courses.id as dg_level_id')
                ->where('degree_level_courses.id', $course_id)->get();

        $bimestres = Subject::
                join('degree_level_courses', 'degree_level_courses.id', 'subjects.level_course_id')
                ->select('subjects.*','degree_level_courses.id as dg_level_id')
                ->distinct('subjects.bimester')
                ->where('degree_level_courses.id', $course_id)->get();

        $unidades = Subject::
                join('degree_level_courses', 'degree_level_courses.id', 'subjects.level_course_id')
                ->select('subjects.*','degree_level_courses.id as dg_level_id')
                ->distinct('subjects.bimester')
                ->distinct('subjects.unit')
                ->where('degree_level_courses.id', $course_id)->get();
        
        
        return view('admin.subject.list', compact('temas', 'bimestres', 'unidades', 'course_data', 'userAuth'));
        
    }

    public function detail($subject_id)
    {


        $tema = Subject::findOrFail($subject_id);

        /*
        $user_id = \Auth::user()->id;
        /*$user_id = \Auth::user()->id;
        $dataClient = new Client;
        $dataClient->tema_id = $tema->id;
        $dataClient->user_id = \Auth::user()->id;
        $dataClient->date = date('Y-m-d');
        $dataClient->hour = date('H:i:s');
        $dataClient->save();*/

        $video = str_replace('watch', 'embed', $tema->link_youtube);
        
        return view('admin.subject.detail', compact('tema', 'video'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $id){
        
        $tema = Subject::findOrFail($id);
        dd($tema);
        echo $id;
        //return view('admin.subject.index')->with(compact('course','subjects', 'id', 'userAuth'));
    }

}
