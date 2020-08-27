<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DegreeLevelCourse;
use App\DegreeLevelUser;
use App\Subject;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public function index($id)
    {
        $course = DegreeLevelCourse::find($id);
        $subjects = Subject::where('level_course_id',$id)->get();
        // Comentario de prueba

        return view('admin.subject.index')->with(compact('course','subjects'));
    }

    public function store(SubjectRequest $request)
    {
    	$subject = new Subject();
        $subject->level_course_id = $request->input('level_course_id');
		$subject->bimester = $request->input('bimester');
		$subject->unit = $request->input('unit');
        $subject->position = $request->input('position');
        $subject->name = $request->input('name');
        $subject->link_youtube = $request->input('link_youtube');
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
        $temas = Subject::
                join('degree_level_courses', 'degree_level_courses.id', 'subjects.level_course_id')
                ->select('subjects.*','degree_level_courses.id as dg_level_id')
                ->where('degree_level_courses.id', $course_id)->get();
        return view('admin.subject.list', [
            'temas' => $temas
        ]);
    }

    public function detail($subject_id)
    {
        /*$tema = Subject::findOrFail($subject_id);

        $user_id = \Auth::user()->id;
        $dataClient = new Client;
        $dataClient->tema_id = $tema->id;
        $dataClient->user_id = \Auth::user()->id;
        $dataClient->date = date('Y-m-d');
        $dataClient->hour = date('H:i:s');
        $dataClient->save();*/

        return view('admin.subject.detail', [
            'tema' => $tema
        ]);
    }
}
