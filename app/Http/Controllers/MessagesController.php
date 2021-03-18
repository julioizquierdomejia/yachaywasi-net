<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Subject;

class MessagesController extends Controller
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

    public function list(Request $request, $subject_id)
    {
        $user_role = \Auth::user()->roles()->first();
        $subject = Subject::findOrFail($subject_id);

        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $totalRecords = Message::where('messages.docente_id', $subject->user_id)
                ->where('messages.subject_id', $subject_id)
                ->where('status', 1)
                ->count();

        $totalRecordswithFilter = Message::select('count(*) as allcount')
                ->where('messages.docente_id', $subject->user_id)
                ->where('messages.subject_id', $subject_id)
                ->where('status', 1)
                ->count();

        $records = Message::select('messages.*')
                ->skip($start)
                ->take($rowperpage)
                ->where('messages.docente_id', $subject->user_id)
                ->where('messages.subject_id', $subject_id)
                ->where('status', 1)
                ->orderBy('created_at', 'asc')
                ->get();

        $rows_array = [];

        foreach ($records as $key => $row) {
            $rows_array[] = array(
              "id" => $row->id,
              "user" => $user_role == 'editor' ? $row->docente->name : $row->student->name,
              "user_id" => $user_role == 'editor' ? $row->docente->id : $row->student->id,
              "comment" => $row->messages,
              "created_at" => date('d-m-Y h:i a', strtotime($row->created_at)),
            );
        };

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $rows_array
        );

        echo json_encode($response);
        exit;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $student_id, $docente_id)
    {
        $rules = array(
            'messages' => 'required',
        );
        $this->validate($request, $rules);

        $comment = Message::create([
            'subject_id' => $request->input('subject_id'),
            'user_id' => $student_id,
            'docente_id' => $docente_id,
            'status' => 1,
            'messages' => $request->input('messages')
        ]);

        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
