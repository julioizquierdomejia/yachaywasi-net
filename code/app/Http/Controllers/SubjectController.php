<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DegreeLevelCourse;

class SubjectController extends Controller
{
    public function index($id)
    {
        $course = DegreeLevelCourse::find($id);

        return view('admin.subject.index')->with(compact('course'));
    }

    public function store(Request $request)
    {

    }
}
