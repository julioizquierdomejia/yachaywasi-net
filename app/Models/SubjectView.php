<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectView extends Model
{
    protected $fillable = [
        'subject_id',
        'user_id',
        'at_time',
        'views',
    ];
    protected $dates = [
    	'created_at',
    	'updated_at'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
