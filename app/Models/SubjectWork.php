<?php

namespace App\Models;

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
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function subject()
    {
        return $this->hasOne('App\Models\Subject', 'id', 'subject_id');
    }
}
