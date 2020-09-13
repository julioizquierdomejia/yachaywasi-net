<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class DegreeLevelUser extends Model
{
    protected $fillable = ['user_id','degree_id','level_id'];

    // Obtener nivel asociadp
    public function level(){
        return $this->belongsTo(Level::class);
    }

    // Obtener grado asociadp
    public function degree(){
        return $this->belongsTo(Degree::class);
    }

    // Obtener cursos asociadp
    public function courses(){
        return $this->hasMany(DegreeLevelCourse::class,'degree_level_id');
    }

    public function verifyDegreeLevelUser(){


        /*
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
        */

        return 'hola';
    }
}
