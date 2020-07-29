<?php

namespace App;
use App\Degree;
use App\User;
use App\Level;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

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


    
}
