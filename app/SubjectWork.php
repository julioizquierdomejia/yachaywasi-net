<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectWork extends Model
{
    protected $fillable = [
        'subject_id',
        'user_id',
        'title',
        'description',
        'file',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
