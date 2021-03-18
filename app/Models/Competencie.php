<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competencie extends Model
{
    public function course(){
    	return $this->belongsTo(Course::class);
    }
}
