<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\SubjectWork;

class SubjectWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title'       => 'string|required',
            'description'    => 'string',
        );
        $this->validate($request, $rules);

        $subjectwork = new SubjectWork();
        $subjectwork = $subjectwork->fill($request->except(['file, user_id']));
        $subjectwork->user_id = auth()->id();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time().'_'.$file->getClientOriginalName();
            //aqui le damos al campo avatar el nombre para que lo grabe
            $subjectwork->file = $file_name;

            if (DIRECTORY_SEPARATOR === '/') {
                $dir = env('FILES_PATH') ? env('FILES_PATH').'/images/subject-works' : public_path('/images/subject-works');
                // unix, linux, mac
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                $file->move($dir, $file_name);
            } else {
                $file->move(public_path('/images/subject-works'), $file_name);
            }
        }
        $subjectwork->save();

        return redirect()->back()->with('status','El registro se actualizó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubjectWork  $subjectwork
     * @return \Illuminate\Http\Response
     */
    public function show($subject)
    {
        $user_role = auth()->user()->roles()->first();
        $current_subject = Subject::findOrFail($subject);
        if ($user_role->name == 'lector') {
            $works = SubjectWork::where('user_id', auth()->id())
                    ->where('subject_id', $subject)
                    ->get();
        } else {
            $works = SubjectWork::where('subject_id', $subject)
                    ->get();
        }
        $title = 'Tareas para '. $current_subject->name;

        return view('admin.subject_works.index', compact('works', 'subject', 'current_subject', 'user_role', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubjectWork  $subjectwork
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectWork $subjectwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubjectWork  $subjectwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectWork $subjectwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubjectWork  $subjectwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectWork $subjectwork)
    {
        //
    }
}
