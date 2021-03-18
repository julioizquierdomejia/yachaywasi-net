<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DegreeLevelCourse extends Model
{
    protected $fillable = ['degree_level_id','course_id'];

    // Obtener curso asociadp
    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function degree_level(){
        return $this->belongsTo(DegreeLevelUser::class);
    }
}
