<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'messages',
        'subject_id',
        'user_id',
        'docente_id',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function docente()
    {
        return $this->hasOne('App\Models\User', 'id', 'docente_id');
    }

    public function student()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
