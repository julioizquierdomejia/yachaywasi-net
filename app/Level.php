<?php

namespace App;
use App\Degree;
use App\User;
use App\Course;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /*
    public function degrees(){
    	$this->hasMany(Degree::class);
    }

    public function get(){

    	$niveles = Level::get();
    	$nivelesArray[''] = 'Selecciona un Nivel';

    	foreach($niveles as $nivel){
    		$nivelesArray[$nivel->id] = $nivel->name;
    	}

    	return $nivelesArray;

    }
    */

    public function users(){
        return $this->belongsToMany('App\User', 'course_degree_level_user');
    }

    
    public function degrees(){
        return $this->hasMany('App\Degree');
    }

    public function courses(){
        return $this->belongsToMany('App\Course', 'course_degree_level_user');
    }
    
}
