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
}
