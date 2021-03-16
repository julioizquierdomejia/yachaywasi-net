<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\DegreeLevelCourse;
use App\DegreeLevelUser;
use App\Subject;
use App\SubjectView;
use App\SubjectWork;
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
        $subjects = Subject::where('level_course_id',$id)
                ->orderBy('bimester', 'desc')
                ->orderBy('unit', 'desc')
                ->orderBy('position', 'desc')
                ->get();
                        //->where('status', 1)
        // Page title
        $title = 'Curso ' . $course->course->name;

        return view('admin.subject.index')->with(compact('course','subjects', 'id', 'userAuth', 'title'));
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
        $subject->link_youtube = $request->input('link_youtube');
        $subject->file_drive = $request->input('file_drive');
        $subject->file_drive_second = $request->input('file_drive_second');
        $subject->urldrive = $request->input('urldrive');
        $subject->urlpdf = $request->input('urlpdf');
        $subject->homework = $request->input('homework');
        $subject->zoom = $request->input('zoom');


        if ($request->input('homework') != null){
            if ($request->input('fecha_vencimiento') == null){
                $fecha_generada = strtotime($request->input('date')."+ 2 days");
                $subject->fecha_vencimiento = $fecha_generada;
            }else{
                $subject->fecha_vencimiento = $request->input('fecha_vencimiento');
            }
        }

        $subject->status = 1;

        
        if ($request->hasFile('file_drive')) {
            $file = $request->file('file_drive');
            $subject->file_drive = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/material/subject/', $subject->file_drive);
        }

        if ($request->hasFile('file_drive_second')) {
            $file = $request->file('file_drive_second');
            $subject->file_drive_second = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/material/subject/', $subject->file_drive_second);
        }

        $subject->save();

        return redirect()->route('subject', $request->input('level_course_id'));
    }

    public function show($course_id)
    {
        //aqui obtengo datos para el nombre del curso actual
        $temaCurrent = Subject
                        //->where('subjects.id', $course_id)->first();
                        ::where('subjects.level_course_id', $course_id)->firstOrFail();

        $curso_current = DB::table('degree_level_courses')
                    //->join('subjects', 'subjects.id', 'degree_level_courses.degree_level_id')
                    ->join('subjects', 'subjects.level_course_id', 'degree_level_courses.id')
                    ->join('courses', 'courses.id' ,'degree_level_courses.course_id')
                    ->first();
        

        $docente_id = $temaCurrent->user_id; //aqui obtenemos el Id del docente del tema actual

        $docente_current = DB::table('users')
                         ->where('users.id', $docente_id)->first();

        $idUser = \Auth::user()->id;
        $userAuth = User::findOrFail((int) $idUser);
        $role = $userAuth->roles->first()->name;

        $temas = Subject::
                join('degree_level_courses', 'degree_level_courses.id', 'subjects.level_course_id')
                ->select('subjects.*','degree_level_courses.id as dg_level_id')
                ->where('degree_level_courses.id', $course_id)
                ->orderBy('bimester', 'desc')
                ->orderBy('unit', 'desc')
                ->orderBy('position', 'desc')
                ->get();


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

        $title = 'Tema ' . $temaCurrent->name;

        return view('admin.subject.list', compact('temas', 'bimestres', 'unidades', 'userAuth', 'docente_current', 'curso_current', 'title', 'role'));
        
    }

    public function detail($subject_id)
    {
        $tema = Subject::findOrFail($subject_id);

        $user_role = \Auth::user()->roles()->first();
        if ($user_role) {
            $now = Carbon::now();
            $now_date = $now->format('Y-m-d');
            if ($user_role->name == 'lector') {
                $subject_viewed = SubjectView::where('user_id', \Auth::id())->first();
                if ($subject_viewed) {
                    $subject_viewed->views++;
                    $subject_viewed->updated_at = $now;
                    $subject_viewed->save();
                } else {
                    $subject_view = SubjectView::create([
                        'subject_id' => $subject_id,
                        'user_id' => \Auth::id(),
                        //'at_time' => $tema->date->format('Y-m-d') == $now_date ? 'P' : 'F',
                        'views' => 1,
                    ]);
                }
            }
        }
        if ($user_role->name == 'lector') {
            $works = SubjectWork::where('user_id', auth()->id())
                    ->where('subject_id', $tema->id)
                    ->get();
        } else {
            $works = SubjectWork::where('subject_id', $tema->id)
                    ->get();
        }

        /*
        /*$user_id = \Auth::id();
        $dataClient = new Client;
        $dataClient->tema_id = $tema->id;
        $dataClient->user_id = $user_id;
        $dataClient->date = date('Y-m-d');
        $dataClient->hour = date('H:i:s');
        $dataClient->save();*/

        //$video = str_replace('watch', 'embed', $tema->link_youtube);

        $video = $tema->link_youtube;

        function YoutubeID($url) {
            if(strlen($url) > 11) {
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                    return $match[1];
                }
                else
                    return false;
            }
            return $url;
        }
        $videoKey = YoutubeID($video);
        $title = 'Tema: ' . $tema->name;

        return view('admin.subject.detail', compact('tema', 'videoKey', 'user_role', 'works', 'title'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $tema = Subject::findOrFail($id);
        $title = 'Tema: ' . $tema->name;

        return view('admin.subject.edit')->with(compact('tema', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {

        $level_course_id = $subject->level_course_id;

        //$subject->fill($request->all());
        $subject->fill($request->except('fecha_vencimiento'));

        if ($request->input('homework') != null){
            if ($request->input('fecha_vencimiento') == null){
                $fecha_generada = strtotime($request->input('date')."+ 2 days");
                $subject->fecha_vencimiento = $fecha_generada;
            }else{
                $subject->fecha_vencimiento = $request->input('fecha_vencimiento');
            }
        }

        //$subject->update($request->all());       

        //luego grabamos todo lo rellenado
        $subject->save();

        //return view('admin.users.index', ['$users' => $users]);
        //return view('level-course');
        return redirect('/level-course/'.$level_course_id);

    }

    public function all(){

        $temas = Subject::all();
        $title = 'Temas';

        /*
        $temas = DB::table('users')
            ->join('subjects', 'subjects.user_id', 'users.id')
            ->select('subjects.*', 'users.name as name_docente')
            ->get();
        */

        return view('admin.subject.all', compact('temas', 'title'));
    }


}
