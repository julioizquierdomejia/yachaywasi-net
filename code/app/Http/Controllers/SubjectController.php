<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DegreeLevelCourse;
use App\Subject;

class SubjectController extends Controller
{
    public function index($id)
    {
        $course = DegreeLevelCourse::find($id);
        $subjects = Subject::where('');

        return view('admin.subject.index')->with(compact('course'));
    }

    public function store(SubjectRequest $request)
    {
    	$subject = new Subject();
        $subject->level_course_id = $request->input('level_course_id');
		$subject->bimester = $request->input('bimester');
		$subject->unit = $request->input('unit');
        $subject->name = $request->input('name');
        $subject->description = $request->input('description');
        $subject->position = $request->input('position');
        $subject->file = $request->input('file');
        $subject->link_youtube = $request->input('link_youtube');
        $subject->link_drive = $request->input('link_drive');
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $subject->file = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/images/subject/', $name);
        }else{
            $subject->file = null;
        }

        $subject->save();

        return redirect()->route('subject', $request->input('level_course_id'));
    }
}
