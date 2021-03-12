<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHoursAssign extends Model
{

    protected $table = 'user_hours_assign';
    
    protected $fillable = [
        'user_id',
        'course_id',
        'level_id',
        'degree_id',
        'day_id',
        'hour_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function hour() {
        return $this->hasOne('App\Hour', 'id', 'hour_id');
    }
    public function day() {
        return $this->hasOne('App\Day', 'id', 'day_id');
    }
}
