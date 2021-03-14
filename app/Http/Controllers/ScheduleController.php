<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Role;
use App\Degree;
use App\Level;
use App\Day;
use App\Hour;
use App\UserHoursAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ScheduleController extends Controller
{
    //

    public function index(Request $request)
    {
        $id = \Auth::user()->id;
        $userAuth = User::findOrFail((int) $id);
        $cursos = Course::where('user_id',$userAuth->id)->get();
        $title = 'Horario';

        //IDS Nivel y grado
        $nivel_id = DB::table('degree_level_users')->where('user_id', $id)->value('level_id');
        $grado_id = DB::table('degree_level_users')->where('user_id', $id)->value('degree_id');
        
        //name nivel y grado
        $nivel = DB::table('levels')->where('id', $nivel_id)->value('name');
        $grado = DB::table('degrees')->where('id', $grado_id)->value('name');

        //Rol del usuario Maestro o alumno
        $rol_id = DB::table('role_user')->where('user_id', $id)->value('role_id');
        $rol = DB::table('roles')->where('id', $rol_id)->value('name');

        return view('admin.schedule.index', compact('nivel_id', 'grado_id', 'nivel', 'grado', 'rol_id', 'rol', 'title'));
    }

    public function assign(Request $request)
    {
        $title = 'Asignación de horas';
        
        $docentes = User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id', 3)->get();
        $cursos = Course::all();
        $days = Day::where('status', 1)->get();
        $hours = Hour::where('status', 1)->get();

        return view('admin.schedule.assign', compact('docentes', 'cursos', 'days', 'hours', 'title'));
    }

    public function old_store(Request $request)
    {
        $dayhour = $request->input('dayhour');
        //$new_arr = array_unique($dayhour, SORT_REGULAR);
        $rules = array(
            'dayhour'   => 'array|required|min:1',
        );

        $uha_deleted = UserHoursAssign::where('user_id', reset($dayhour)['user_id'])->delete();

        foreach ($dayhour as $key => $val) {
            $rules['dayhour.'.$key.'.*'] = Rule::unique('user_hours_assign')->where(function ($query) use($val) {
                return $query
                            ->where('user_id', $val['user_id'])
                            ->where('course_id', $val['course_id'])
                            ->where('level_id', $val['level_id'])
                            ->where('degree_id', $val['degree_id'])
                            ->where('day_id', $val['day_id'])
                            ->where('hour_id', $val['hour_id'])
                            ->where('enabled', 1);
            });
        }
        $this->validate($request, $rules);

        foreach ($dayhour as $key => $item) {
            $userhoursassign = new UserHoursAssign();
            $userhoursassign->user_id = $item['user_id'];
            $userhoursassign->course_id = $item['course_id'];
            $userhoursassign->level_id = $item['level_id'];
            $userhoursassign->degree_id = $item['degree_id'];
            $userhoursassign->day_id = $item['day_id'];
            $userhoursassign->hour_id = $item['hour_id'];
            $userhoursassign->save();
        }

        return response()->json(['data'=>[], 'success'=>true]);
    }

    public function store(Request $request)
    {
        $dayhour = $request->input('dayhour');
        $rules = array(
            'dayhour'   => 'array|required|min:1',
        );

        $dayhour_exist = [];
        
        foreach ($dayhour as $key => $dhour) {
            $uha_exists = UserHoursAssign::where('level_id', $dhour['level_id'])
                ->where('degree_id', $dhour['degree_id'])
                ->where('day_id', $dhour['day_id'])
                ->where('hour_id', $dhour['hour_id'])
                ->where('enabled', 1)
                ->exists();
            if ($uha_exists) {
                $dayhour_exist[$key]['level_id'] = $dhour['level_id'];
                $dayhour_exist[$key]['degree_id'] = $dhour['degree_id'];
                $dayhour_exist[$key]['day_id'] = $dhour['day_id'];
                $dayhour_exist[$key]['hour_id'] = $dhour['hour_id'];
            }
        }

        if ($uha_exists) {
            $returnData = array(
                'status' => 'error',
                'message' => 'Ya existe el registro',
                'not_allowed' => true,
                'errors' => $dayhour_exist
            );
            return response()->json([
                'data' => $returnData,
                'success' => false
            ], 422);
        }

        $dayhour_f_exist = [];
        foreach ($dayhour as $key => $dhour) {
            $uha_exists = UserHoursAssign::where('day_id', $dhour['day_id'])
                ->where('hour_id', $dhour['hour_id'])
                ->where('enabled', 1)
                ->exists();
            if ($uha_exists) {
                $dayhour_f_exist[$key]['day_id'] = $dhour['day_id'];
                $dayhour_f_exist[$key]['hour_id'] = $dhour['hour_id'];
            }
        }
        if ($uha_f_exists) {
            $returnData = array(
                'status' => 'error',
                'message' => 'Ya existe el registro',
                'not_allowed' => true,
                'errors' => $dayhour_f_exist
            );
            return response()->json([
                'data' => $returnData,
                'success' => false
            ], 422);
        }

        foreach ($dayhour as $key => $val) {
            $rules['dayhour.'.$key.'.*'] = Rule::unique('user_hours_assign')->where(function ($query) use($val) {
                return $query
                            ->where('day_id', $val['day_id'])
                            ->where('hour_id', $val['hour_id'])
                            ->where('enabled', 1);
            });
        }
        $this->validate($request, $rules);

        foreach ($dayhour as $key => $item) {
            $userhoursassign = new UserHoursAssign();
            $userhoursassign->user_id = $item['user_id'];
            $userhoursassign->course_id = $item['course_id'];
            $userhoursassign->level_id = $item['level_id'];
            $userhoursassign->degree_id = $item['degree_id'];
            $userhoursassign->day_id = $item['day_id'];
            $userhoursassign->hour_id = $item['hour_id'];
            $userhoursassign->save();
        }

        return response()->json(['data'=>[], 'success'=>true]);
    }

    public function getUserHoursAssigned(Request $request)
    {
        $user_id = $request->get('user_id');
        $course_id = $request->get('course_id');
        $level_id = $request->get('level_id');
        $degree_id = $request->get('degree_id');
        $hoursassign_byuser = UserHoursAssign::join('users', 'users.id', '=', 'user_hours_assign.user_id')
                                ->join('days', 'days.id', '=', 'user_hours_assign.day_id')
                                ->join('hours', 'hours.id', '=', 'user_hours_assign.hour_id')
                                ->join('courses', 'courses.id', '=', 'user_hours_assign.course_id')
                                ->join('degrees', 'degrees.id', '=', 'user_hours_assign.degree_id')
                                ->join('levels', 'levels.id', '=', 'user_hours_assign.level_id')
                                ->select(
                                    'days.id as day_id',
                                    'hours.id as hour_id',
                                    'courses.id as course_id',
                                    'degrees.id as degree_id',
                                    'levels.id as level_id',
                                    'days.name as day',
                                    'hours.name as hour',
                                    'courses.name as course',
                                    'user_hours_assign.enabled'
                                )
                                ->where('user_hours_assign.user_id', $user_id)
                                ->where('user_hours_assign.course_id', $course_id)
                                ->where('user_hours_assign.level_id', $level_id)
                                ->where('user_hours_assign.degree_id', $degree_id)
                                ->where('enabled', 1)
                                ->orderBy('days.name', 'asc')
                                ->get();

        return response()->json(['data'=>json_encode($hoursassign_byuser), 'success'=>true]);
    }

}
