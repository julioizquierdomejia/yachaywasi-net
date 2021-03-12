<?php

namespace App;
use App\Degree;
use App\User;
use App\Level;
use App\DegreeLevelCourse;
use App\DegreeLevelUser;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name', 'abreviatura', 'descripcion', 'images', 'bg-color', 'color',
    ];

    /*
	public function Users(){
        return $this->belongsTo('App\User');
    }
    */

    public function competencie(){
    	return $this->hasMany(Competencie::class);
    }

    /*
    public function Degrees_(){
        return $this->belongsToMany('App\Degree', 'course_degree_level_user');
    }

     public function Users_(){
        return $this->belongsToMany('App\User', 'course_degree_level_user');
    }

    public function Levels_(){
        return $this->belongsToMany('App\Level', 'course_degree_level_user');
    }
    */

    public function users(){
        return $this->belongsToMany('App\User', 'course_degree_level_user');
    }

    
    public function levels(){
        return $this->belongsToMany('App\Level', 'course_degree_level_user');
    }

    public function degrees(){
        return $this->belongsToMany('App\Degree', 'course_degree_level_user');
    }

    public function testing(){
        return 'mensaje de prueba';
    }

    public function verifyCourseInLevelDegree($userId,$levelId,$degreeId){
        $courseId = $this->attributes['id'];
        $checked = false;
        $degreeLevelUser = DegreeLevelUser::where('user_id',$userId)->where('level_id',$levelId)->where('degree_id',$degreeId)->get();

        foreach ($degreeLevelUser as $degreeLevel) {
            $degreeLevelCourse = DegreeLevelCourse::where('degree_level_id',$degreeLevel->id)->where('course_id',$courseId)->first();

            if($degreeLevelCourse){
                $checked = true;
            }
        }

        return $checked;
    }
    
}
