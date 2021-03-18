<?php

namespace App\Models;
use App\Models\Level;
use App\Models\User;
use App\Models\Course;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{	

    public function users(){
        return $this->belongsToMany('App\Models\User', 'course_degree_level_user');
    }

    
    public function levels(){
        return $this->hasMany('App\Models\Level', 'course_degree_level_user');
    }

    public function courses(){
        return $this->belongsToMany('App\Models\Course', 'course_degree_level_user');
    }

	//Un grado pertenece a un Nivel
	/*
    return $this->belongsToMany('App\Models\Course', 'course_degree_level_user');
    
    public function Levels(){
        return $this->belongsTo('App\Models\Level');
    }

    public function cursos(){
        return $this->belongsTo(Course::class);
    }


    public function Users_(){
        return $this->belongsToMany('App\Models\User', 'course_degree_level_user');
    }

    public function Levels_(){
        return $this->belongsToMany('App\Models\Level', 'course_degree_level_user');
    }

    public function Courses_(){
        return $this->belongsToMany('App\Models\Course', 'course_degree_level_user');
    }
    */


}
