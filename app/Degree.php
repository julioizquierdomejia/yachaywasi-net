<?php

namespace App;
use App\Level;
use App\User;
use App\Course;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{	

    public function users(){
        return $this->belongsToMany('App\User', 'course_degree_level_user');
    }

    
    public function levels(){
        return $this->hasMany('App\Level', 'course_degree_level_user');
    }

    public function courses(){
        return $this->belongsToMany('App\Course', 'course_degree_level_user');
    }

	//Un grado pertenece a un Nivel
	/*
    return $this->belongsToMany('App\Course', 'course_degree_level_user');
    
    public function Levels(){
        return $this->belongsTo('App\Level');
    }

    public function cursos(){
        return $this->belongsTo(Course::class);
    }


    public function Users_(){
        return $this->belongsToMany('App\User', 'course_degree_level_user');
    }

    public function Levels_(){
        return $this->belongsToMany('App\Level', 'course_degree_level_user');
    }

    public function Courses_(){
        return $this->belongsToMany('App\Course', 'course_degree_level_user');
    }
    */


}
