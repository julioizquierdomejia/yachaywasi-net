<?php

namespace App;

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
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
