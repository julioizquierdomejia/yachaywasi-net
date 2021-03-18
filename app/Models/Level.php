<?php

namespace App\Models;
use App\Models\Degree;
use App\Models\User;
use App\Models\Course;

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
        return $this->belongsToMany('App\Models\User', 'course_degree_level_user');
    }

    
    public function degrees(){
        return $this->hasMany('App\Models\Degree');
    }

    public function courses(){
        return $this->belongsToMany('App\Models\Course', 'course_degree_level_user');
    }
    
}
